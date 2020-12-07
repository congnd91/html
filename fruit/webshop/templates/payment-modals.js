<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

var async = async || [];
async.push(function() {
    'use strict';

    function reload() {
        var reload_url = window.location.href.split(/#/)[0];
        var separator = (reload_url.indexOf("?") === -1) ? "?" : "&";
        reload_url = reload_url + separator + 'reload=1' + window.location.hash;
        window.location = reload_url;
    }
    function manage_error(request, status, error) {
        if (request.responseJSON) {
            alert(request.responseJSON);
        } else {
            alert(error);
        }
        reload();
    }

    var stripe = Stripe('{{ stripe_key }}', {
        locale: '{{ get_locale() }}',
    });
    var elements = stripe.elements();
    var card = elements.create('card', {
        hidePostalCode: true,
    });
    $('#card-register').on('show.bs.modal', function() {
        var setup_intent = $.ajax({
            method: 'POST',
            url: "{{ url_for('payment_setup_intent') }}",
            data: {
                csrf_token: $("meta[name='csrf_token']").attr('content'),
            },
        }).fail(manage_error);
        card.mount('#card-element');
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        card.on('ready', function() {
            card.focus();
        });
        var $form = $('#card-register-form');
        $form.submit(function(event) {
            event.preventDefault();
            if ($(this).data('submitting')) {
                return false;
            }
            var $buttons = $(this).find("*[type='submit']");
            $buttons.attr('disabled', true).button('submitting');

            setup_intent.done(function(client_secret) {
                stripe.handleCardSetup(client_secret, card)
                .then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        $buttons.attr('disabled', false).button('reset');
                    } else {
                        $.ajax({
                            method: 'POST',
                            url: "{{ url_for('payment_setup_intent_update') }}",
                            data: {
                                csrf_token: $("meta[name='csrf_token']").attr('content'),
                            },
                        }).always(reload);
                    }
                });
            });
        });
    }).on('hide.bs.modal', function() {
        card.unmount();
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = '';
    });

    $('#sepa-register').on('show.bs.modal', function() {
        var $form = $('#sepa-register-form');
        $form.submit(function(event) {
            event.preventDefault();
            var customer_name = $('#sepa-register-form-name').val();
            var account_number = $('#sepa-register-form-iban').val();
            var errorElement = document.getElementById(
                'sepa-register-errors');

            if (!IBAN.isValid(account_number)) {
                errorElement.textContent = '{{ gettext("Your account number is incorrect.") }}';
                return;
            }
            var $buttons = $(this).find("*[type='submit']");
            $buttons.attr('disabled', true).button('submitting');


            stripe.createSource({
                type: 'sepa_debit',
                sepa_debit: {
                    iban: IBAN.printFormat(account_number, ''),
                },
                currency: '{{ payment_currency.code | lower }}',
                owner: {
                    name: customer_name,
                },
            }).then(function(result) {
                if (result.error) {
                    errorElement.textContent = result.error.message;
                    $buttons.attr('disabled', false).button('reset');
                } else {
                    $.ajax({
                        method: 'POST',
                        url: "{{ url_for('payment_source_register') }}",
                        data: {
                            csrf_token: $("meta[name='csrf_token']").attr('content'),
                            source: JSON.stringify(result.source),
                        },
                    }).done(function() {
                        reload();
                    }).fail(function(request, status, error) {
                        if (request.responseJSON) {
                            alert(request.responseJSON);
                        } else {
                            alert(error);
                        }
                        reload();
                    });
                }
            });
        });
    }).on('hide.bs.modal', function() {
        var errorElement = document.getElementById('sepa-register-errors');
        errorElement.textContent = '';
    });

    $('#sepa-register-form-iban').on('input', function(event) {
        var iban_input = $('#sepa-register-form-iban');
        var account_number = iban_input.val();

        if (!IBAN.isValid(account_number)) {
            iban_input.parent().addClass('has-error');
        } else {
            iban_input.parent().removeClass('has-error');
        }
        iban_input.val(IBAN.printFormat(account_number, ' '));
    });

    $('#sofort-register').on('show.bs.modal', function() {
        var form = document.getElementById('sofort-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var name = $('#sofort-name').val();
            var currency_factor = 10 ** {{ payment_currency.digits }};
            var amount = Math.round($('#sofort-amount').val() * currency_factor);
            var country = $('#sofort-country').val();

            stripe.createSource({
                type: 'sofort',
                amount: amount,
                currency: '{{ payment_currency.code | lower }}',
                owner: {
                    'name': name,
                },
                redirect: {
                    return_url: '{{ url_for('payment_wait', next=deposit_url or request_full_path(), _external=True) }}',
                },
                sofort: {
                    country: country,
                },
            }).then(function(result) {
                if (result.error) {
                    alert(result.error.message);
                } else {
                    $.ajax({
                        method: 'POST',
                        url: '{{ url_for('payment_register', origin=order if order else None) }}',
                        data: {
                            csrf_token: $("meta[name='csrf_token']").attr('content'),
                            source: JSON.stringify(result.source),
                        },
                    }).done(function() {
                        location.href = result.source.redirect.url;
                    }).fail(function(request, status, error) {
                        alert(error);
                        reload();
                    });
                }
            });
        });
    });
});
</script>
