// bPanel4

import './register-jquery.js'

import bootstrap from 'bootstrap'

import flatpickr from 'flatpickr';
import '/node_modules/flatpickr/dist/flatpickr.css';

import './register-select2.js'

import '/node_modules/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.js';

import '../scss/dual-list-box.scss'

import tinymce from "tinymce";
import '/node_modules/tinymce/themes/silver/theme';
import '/node_modules/tinymce/models/dom/model';
import '/node_modules/tinymce/plugins/lists/plugin';
import '/node_modules/tinymce/plugins/table/plugin';
import '/node_modules/tinymce/plugins/image/plugin';
import '/node_modules/tinymce/plugins/anchor/plugin';
import '/node_modules/tinymce/plugins/media/plugin';
import '/node_modules/tinymce/plugins/link/plugin';
import '/node_modules/tinymce/plugins/advlist/plugin';
import '/node_modules/tinymce/plugins/code/plugin';
import '/node_modules/tinymce/plugins/fullscreen/plugin';
import '/node_modules/tinymce/plugins/searchreplace/plugin';
import '/node_modules/tinymce/icons/default/icons';
import '/node_modules/tinymce-i18n/langs6/es.js';
import '/node_modules/tinymce/skins/ui/oxide/skin.css';
import '/node_modules/bootstrap-fileinput/js/fileinput.js'
import '/node_modules/bootstrap-fileinput/css/fileinput.css'

// Sweet alert
import Swal from 'sweetalert2'

// Cada vez que se abre un Swal, modificamos los estilos de los botones
document.addEventListener('DOMContentLoaded', () => {
    // Esto intercepta todos los SweetAlert2 abiertos
    const observer = new MutationObserver(() => {
        const confirmBtn = document.querySelector('.swal2-confirm');
        const cancelBtn = document.querySelector('.swal2-cancel');

        if(confirmBtn) {
            confirmBtn.style.backgroundColor = '#28a745'; // verde
            confirmBtn.style.color = '#fff';
        }
        if(cancelBtn) {
            cancelBtn.style.backgroundColor = '#dc3545'; // rojo
            cancelBtn.style.color = '#fff';
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });
});


window.Swal = Swal;

// Abrir automáticamente el menú mostrando la entrada correspondiente a la página que se está viendo (si existe)
document.addEventListener('DOMContentLoaded', function () {
  for (let i = 0; i < 5; i++) {
    document.querySelectorAll('.nav-item.active').forEach((item) => {
      if (item.closest('.collapse') !== null) {
        item.closest('.collapse').classList.add('show');
        item.closest('.collapse').classList.remove('collapse');
      }
    });
  }
});

import { Fancybox } from "@fancyapps/ui";

window.addEventListener("load", () => {
  Fancybox.bind('[data-fancybox]', {});
});

document.addEventListener("DOMContentLoaded", function() {
    const banner = document.getElementById("top-banner");
    const header = document.querySelector("header.td_site_header");

    if (banner && header) {
        header.style.marginTop = banner.offsetHeight + "px";
    }
});
