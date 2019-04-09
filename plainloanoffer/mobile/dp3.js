(function () {
	'use strict';
	
	var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		partsPriority = ['Year', 'Month', 'Day'],
		states = ["AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"];
	
	
	function mobileDatePicker(dataElem, short) {
		var me = this,
			target = dataElem,
			selects = {},
			control,
			isChanging = false,
			minDate,
			maxDate,
			_short = short,
			
			getDatePartOpts = function (key) {
				var result = "";
				switch (key) {
					case 'Year':
						var curYear = new Date().getFullYear(),
							maxYear = maxDate ? maxDate.getFullYear() : curYear,
							range = curYear - 101;
						
						for (var yr = maxYear; yr > range; yr--) {
							result += '<option value=' + yr + ' >' + yr + '</option>';
						}
						break;
					case 'Month':
						for (var mt = 1; mt <= 12; mt++) {
							var mn = monthNames[mt - 1];
							if (_short) mn = mn.substr(0, 3);
							result += '<option value=' + mt + ' >' + mn + '</option>';
						}
						break;
					case 'Day':
						for (var d = 1; d <= 31; d++) {
							
							result += '<option value=' + d + ' >' + d + '</option>';
						}
				}
				
				return result;
			},
			
			parseDateModifier = function (expr) {
				if (!expr) return 0;
				
				var current = 0,
					signMod = 1,
					yMod = 0,
					mMod = 0,
					dMod = 0,
					parsed = false;
				
				for (var idx = 0; idx < expr.length; idx++) {
					var c = expr.charAt(idx);
					
					switch (c) {
						case ' ':
							continue;
							break;
						case '-':
							signMod = -1;
							break;
						case '+':
							signMod = 1;
							break;
						case 'y':
							if (yMod) throw 'Incorrect date expr : year';
							yMod = current * signMod;
							parsed = true;
							break;
						case 'm':
							if (mMod) throw 'Incorrect date expr : month';
							mMod = current * signMod;
							parsed = true;
							break;
						case 'd':
							if (dMod) throw 'Incorrect date expr : day';
							dMod = current * signMod;
							parsed = true;
							break;
						default:
							if (c.match(/[0-9]/)) {
								var iVal = parseInt(c);
								current = current * 10 + iVal;
							}
							else {
								throw 'Unexpected symbol';
							}
					}
					
					if (parsed) {
						current = 0;
						signMod = 1;
						parsed = false;
					}
				} // for
				
				var d = new Date();
				
				return new Date(d.getFullYear() + yMod, d.getMonth() + mMod, d.getDate() + dMod);
			},
			
			initDateRange = function () {
				var minDateVal = $(target).attr('minDate'),
					maxDateVal = $(target).attr('maxDate');
				
				if (minDateVal) {
					minDate = parseDateModifier(minDateVal);
				}
				
				if (maxDateVal) {
					maxDate = parseDateModifier(maxDateVal);
				}
			},
			
			leapYear = function (year) {
				return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
			},
			
			updateDependentOptions = function (val, dependentKey) {
				var dateParts = [],
					dependent = (dependentKey) ? selects[dependentKey] : null,
					minVal = 0,
					maxVal,
					yr = selects['Year'].val(),
					month = selects['Month'].val()
				
				switch (dependentKey) {
					case 'Month': // Works only when min / max values are set.
						maxVal = 12;
						if (maxDate && yr && yr == maxDate.getFullYear()) {
							maxVal = maxDate.getMonth() + 1;
						}
						break;
					case 'Day':
						var maxDay;
						if (val == 2) // February
						{
							maxDay = (!yr || leapYear(yr)) ? 29 : 28;
						} else {
							var idx = (val > 7) ? val - 7 : val;
							maxDay = (idx & 1) ? 31 : 30;
						}
						
						if (yr && month && yr == maxDate.getFullYear() && month == maxDate.getMonth() + 1) {
							maxDay = maxDate.getDate();
						}
						
						maxVal = maxDay;
						break;
				}
				
				var options = dependent.find('option'),
					currentVal = dependent.val();
				for (var idx = 1; idx < options.length; idx++) {
					var opt = $(options[idx]),
						optVal = opt.val(),
						optVisible = opt.val() <= maxVal;
					opt.toggle(optVisible);
					if (!optVisible) opt.attr('disabled', 'disabled'); else opt.removeAttr('disabled');
					if (!optVisible && optVal == currentVal) {
						dependent.val('');
					}
				}
				
				dependent.change();
			},
			
			hiddenValUpdated = function () {
				var val = $(this).val(),
					enabled = !($(this).attr('disabled'));
				
				try {
					for (var i in selects) {
						selects[i].data('_changing');
						if (!enabled) {
							selects[i].attr('disabled', 'disabled');
						}
					}
					
					var indexes = [0, 0, 0],
						k = 0,
						parts;
					
					if (val) {
						parts = val.split('/');
						for (var l in parts) {
							indexes[l] = parseInt(parts[l]);
						}
					}
					
					// var k = 0;
					for (var j in selects) {
						if (!indexes[k]) selects[j].val(''); else selects[j].val(indexes[k]);
						k++;
					}
				}
				finally {
					for (var i in selects) {
						selects[i].removeData('_changing');
					}
				}
			},
			
			selectChanged = function () {
				var elem = $(this),
					val = elem.val(),
					key = elem.attr('data-part'),
					priorityIdx = $.inArray(key, partsPriority),
					dependentKey = (priorityIdx == 2) ? "" : partsPriority[priorityIdx + 1],
					dependent = (dependentKey) ? selects[dependentKey] : null,
					tgt = $(target);
				
				if (elem.data('_changing')) return;
				
				elem.data('_changing', true);
				
				if (dependentKey) {
					updateDependentOptions(val, dependentKey);
				}
				
				var parts = [];
				for (var i = 0; i <= 2; i++) {
					var partVal = selects[partsPriority[i]].val();
					if (partVal) {
						parts.push(partVal);
					}
				}
				
				var dateVal = '';
				if (parts.length == 3) {
					dateVal = parts[1] + '/' + parts[2] + '/' + parts[0];
				}
				
				target.off('change', hiddenValUpdated);
				tgt.val(dateVal);
				tgt.change();
				target.on('change', hiddenValUpdated);
				
				elem.removeData('_changing');
			},
			
			attach = function () {
				var ctr = $('<div class="b2c-three-cols b2c-date-select"></div>'),
					parts = ['Month', 'Day', 'Year'],
					base = target.attr('name');
				
				
				target.after(ctr);
				initDateRange();
				for (var i = 0; i <= 2; i++) {
					var key = parts[i],
						col = $('<div class="b2c-col"></div>'),
						select = $('<select name="' + base + '_' + key + '" class="b2c-required b2c-dp-element"><option value="">' + key.substr() + '</option>' + getDatePartOpts(key) + '</select>');
					
					select.attr('data-part', key);
					selects[key] = select;
					select.appendTo(col);
					select.on('change', selectChanged);
					
					col.appendTo(ctr);
				}
				
				target.attr('b2c-display-field', '.b2c-dp-element');
				
				for (var k = 2; k >= 0; k--) {
					selects[parts[k]].change();
				}
				
				target.on('change', hiddenValUpdated);
				
				return ctr;
			};
		
		control = attach();
		control.data("_control", me);
	}
	
	function yearSelectChange() {
		var elem = $(this),
			ctr = elem.closest('.b2c-dob-wrapper'),
			val = elem.val();
		
		if (!val) { // Clear all restrictions.
			return;
		}
	}
	
	function createMobileDP(dataElem, shortMode) {
		var dp = new mobileDatePicker(dataElem, shortMode);
	}
	
	lmpost.preInitMobileDP = function (ui, shortMode) {
		ui.find('.b2c-date-mobile').hide().each(function () {
			createMobileDP($(this), shortMode);
		});
	};
}());