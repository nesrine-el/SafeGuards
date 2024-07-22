/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

console.log('debut js')

import './styles/app.scss';

// leaflet
import  'leaflet';


// pour le js de bootstrap, importer les composants utilisés !
import { Dropdown } from 'bootstrap';


// leaflet map
import './js/map.js';

console.log('Fin du js');
