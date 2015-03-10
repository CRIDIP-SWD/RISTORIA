/* French initialisation for the jQuery UI date picker plugin. */
/* Written by Keith Wood (kbwood{at}iinet.com.au),
 StÃ©phane Nahmani (sholby@sholby.net),
 StÃ©phane Raimbault <stephane.raimbault@gmail.com> */
(function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define([ "vendor/jquery-1.11.1.min.js" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}(function( datepicker ) {
    datepicker['fr'] = {
        closeText: 'Fermer',
        prevText: 'PrÃ©cÃ©dent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['janvier', 'fÃ©vrier', 'mars', 'avril', 'mai', 'juin',
            'juillet', 'aoÃ»t', 'septembre', 'octobre', 'novembre', 'dÃ©cembre'],
        monthNamesShort: ['janv.', 'fÃ©vr.', 'mars', 'avril', 'mai', 'juin',
            'juil.', 'aoÃ»t', 'sept.', 'oct.', 'nov.', 'dÃ©c.'],
        dayNames: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
        dayNamesShort: ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'],
        dayNamesMin: ['D','L','M','M','J','V','S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    datepicker.setDefaults(datepicker['fr']);

    return datepicker['fr'];

}));
