import './bootstrap';
import 'jquery';

import 'bootstrap-icons/font/bootstrap-icons.css'



import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

import $ from 'jquery';

window.jQuery = $;
window.$ = $;