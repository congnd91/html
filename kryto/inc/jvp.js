var countries = {
    af: "93",
    al: "355",
    dz: "213",
    as: "684",
    ad: "376",
    ao: "244",
    ai: "1-264",
    aq: "672",
    ag: "1-268",
    ar: "54",
    am: "374",
    aw: "297",
    au: "61",
    at: "43",
    az: "994",
    bs: "1-242",
    bh: "973",
    bd: "880",
    bb: "1-246",
    by: "375",
    be: "32",
    bz: "501",
    bj: "229",
    bm: "1-441",
    bt: "975",
    bo: "591",
    ba: "387",
    bw: "267",
    br: "55",
    bn: "673",
    bg: "359",
    bf: "226",
    bi: "257",
    kh: "855",
    cm: "237",
    ca: "1",
    cv: "238",
    ky: "1-345",
    cf: "236",
    td: "235",
    cl: "56",
    cn: "86",
    cx: "61",
    cc: "61",
    co: "57",
    km: "269",
    cg: "242",
    cd: "243",
    ck: "682",
    cr: "506",
    hr: "385",
    cu: "53",
    cy: "357",
    cz: "420",
    dk: "45",
    dj: "253",
    dm: "1-767",
    do: "809",
    ec: "593",
    eg: "20",
    sv: "503",
    gq: "240",
    er: "291",
    ee: "372",
    et: "251",
    fk: "500",
    fo: "298",
    fj: "679",
    fi: "358",
    fr: "33",
    gf: "594",
    ga: "241",
    gm: "220",
    ge: "995",
    de: "49",
    gh: "233",
    gi: "350",
    gb: "44",
    gr: "30",
    gl: "299",
    gd: "1-473",
    gp: "590",
    gu: "1-671",
    gt: "502",
    gn: "224",
    gw: "245",
    gy: "592",
    ht: "509",
    hn: "504",
    hk: "852",
    hu: "36",
    is: "354",
    in: "91",
    id: "62",
    ir: "98",
    iq: "964",
    ie: "353",
    il: "972",
    it: "39",
    ci: "225",
    jm: "1-876",
    jp: "81",
    jo: "962",
    kz: "7",
    ke: "254",
    ki: "686",
    kp: "850",
    kr: "82",
    kw: "965",
    kg: "996",
    la: "856",
    lv: "371",
    lb: "961",
    ls: "266",
    lr: "231",
    ly: "218",
    li: "423",
    lt: "370",
    lu: "352",
    mo: "853",
    mk: "389",
    mg: "261",
    mw: "265",
    my: "60",
    mv: "960",
    ml: "223",
    mt: "356",
    mh: "692",
    mq: "596",
    mr: "222",
    mu: "230",
    yt: "269",
    mx: "52",
    fm: "691",
    md: "373",
    mc: "377",
    mn: "976",
    me: "382",
    ms: "1-664",
    ma: "212",
    mz: "258",
    mm: "95",
    na: "264",
    nr: "674",
    np: "977",
    nl: "31",
    an: "599",
    nc: "687",
    nz: "64",
    ni: "505",
    ne: "227",
    ng: "234",
    nu: "683",
    nf: "672",
    mp: "670",
    no: "47",
    om: "968",
    pk: "92",
    pw: "680",
    pa: "507",
    pg: "675",
    py: "595",
    pe: "51",
    ph: "63",
    pl: "48",
    pf: "689",
    pt: "351",
    pr: "1-787",
    qa: "974",
    re: "262",
    ro: "40",
    ru: "7",
    rw: "250",
    sh: "290",
    kn: "1-869",
    lc: "1-758",
    pm: "508",
    vc: "1-784",
    ws: "684",
    sm: "378",
    st: "239",
    sa: "966",
    sn: "221",
    rs: "381",
    sc: "248",
    sl: "232",
    sg: "65",
    sk: "421",
    si: "386",
    sb: "677",
    so: "252",
    za: "27",
    es: "34",
    lk: "94",
    sd: "249",
    sr: "597",
    sz: "268",
    se: "46",
    ch: "41",
    sy: "963",
    tw: "886",
    tj: "992",
    tz: "255",
    th: "66",
    tg: "228",
    tk: "690",
    to: "676",
    tt: "1-868",
    tn: "216",
    tr: "90",
    tm: "993",
    tc: "1-649",
    tv: "688",
    uk: "44",
    ug: "256",
    ua: "380",
    ae: "971",
    uy: "598",
    us: "1",
    uz: "998",
    vu: "678",
    va: "39",
    ve: "58",
    vn: "84",
    vg: "1-284",
    vi: "1-340",
    wf: "681",
    ye: "967",
    zm: "260",
    zw: "263"
};

function submit_form(i) {
    console.log(123);
    if (!checkReg2(i)) {
        return 0;
    }
    console.log(234);
    window.location.replace("http://google.com");
    $('#regform' + i).fadeOut("slow", function () {
        $('#wait' + i).fadeIn("slow", function () {
            $.post('index.php', $('#regform' + i).serialize(), function (json) {
                console.log(json);
                data = $.parseJSON(json);
                if (data['response'] == "success") {
                    email = data['data']['email'];
                    pass = data['data']['pass'];
                    url = data['data']['url'];
                    b = data['data']['b'];
                    c = data['data']['c'];
                    document.getElementById("al_email").value = email;
                    document.getElementById("al_pass").value = pass;
                    document.getElementById("al_b").value = b;
                    document.getElementById("al_c").value = c;
                    document.getElementById("al").action = url;

                    document.getElementById("al").submit();
                } else if (data['response'] == "error") {
                    document.getElementById('regerror' + i).innerHTML = data['data'];
                    $('#regerror' + i).fadeIn("slow", function () {
                        setTimeout(function () {
                            $('#regerror' + i).fadeOut("slow");
                        }, 10000)
                    });

                    $('#wait' + i).fadeOut("slow");
                    $('#regform' + i).fadeIn("slow");
                } else {
                    document.getElementById('regerror').innerHTML = "Something went wrong, please try again";
                    $('#wait' + i).fadeOut("slow");
                    $('#regform' + i).fadeIn("slow");
                    $('#regerror' + i).fadeIn("slow", function () {
                        setTimeout(function () {
                            $('#regerror' + i).fadeOut("slow");
                        }, 10000)
                    });
                }
            });
        });
    });
}

function get_area_code(cc) {
    return countries[cc];
}

function change_country(val) {
    for (i = 0; i < document.getElementsByName("phone").length; i++) {
        document.getElementsByName("phone")[i].value = "+" + get_area_code(val.toLowerCase()) + " ";
    }
}

//jQuery(document).ready(function() {
//	change_country( document.getElementsByName('country')[0].value );
//});
