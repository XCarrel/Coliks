//! moment.js locale configuration

;(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined'
        && typeof require === 'function' ? factory(require('../moment')) :
    typeof define === 'function' && define.amd ? define(['../moment'], factory) :
    factory(global.moment)
 }(this, (function (moment) { 'use strict';
 
 
     var frCh = moment.defineLocale('fr-ch', {
         months : 'janvier_fÃ©vrier_mars_avril_mai_juin_juillet_aoÃ»t_septembre_octobre_novembre_dÃ©cembre'.split('_'),
         monthsShort : 'janv._fÃ©vr._mars_avr._mai_juin_juil._aoÃ»t_sept._oct._nov._dÃ©c.'.split('_'),
         monthsParseExact : true,
         weekdays : 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
         weekdaysShort : 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
         weekdaysMin : 'di_lu_ma_me_je_ve_sa'.split('_'),
         weekdaysParseExact : true,
         longDateFormat : {
             LT : 'HH:mm',
             LTS : 'HH:mm:ss',
             L : 'DD.MM.YYYY',
             LL : 'D MMMM YYYY',
             LLL : 'D MMMM YYYY HH:mm',
             LLLL : 'dddd D MMMM YYYY HH:mm'
         },
         calendar : {
             sameDay : '[Aujourdâ€™hui Ã ] LT',
             nextDay : '[Demain Ã ] LT',
             nextWeek : 'dddd [Ã ] LT',
             lastDay : '[Hier Ã ] LT',
             lastWeek : 'dddd [dernier Ã ] LT',
             sameElse : 'L'
         },
         relativeTime : {
             future : 'dans %s',
             past : 'il y a %s',
             s : 'quelques secondes',
             ss : '%d secondes',
             m : 'une minute',
             mm : '%d minutes',
             h : 'une heure',
             hh : '%d heures',
             d : 'un jour',
             dd : '%d jours',
             M : 'un mois',
             MM : '%d mois',
             y : 'un an',
             yy : '%d ans'
         },
         dayOfMonthOrdinalParse: /\d{1,2}(er|e)/,
         ordinal : function (number, period) {
             switch (period) {
                 // Words with masculine grammatical gender: mois, trimestre, jour
                 default:
                 case 'M':
                 case 'Q':
                 case 'D':
                 case 'DDD':
                 case 'd':
                     return number + (number === 1 ? 'er' : 'e');
 
                 // Words with feminine grammatical gender: semaine
                 case 'w':
                 case 'W':
                     return number + (number === 1 ? 're' : 'e');
             }
         },
         week : {
             dow : 1, // Monday is the first day of the week.
             doy : 4  // The week that contains Jan 4th is the first week of the year.
         }
     });
 
     return frCh;
 
 })));