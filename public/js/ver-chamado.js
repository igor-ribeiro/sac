;(function ($) {
    'use strict';

    var VerChamado = {
        $modal: $('.js-modal'),
        $fields: $('.js-field'),

        init: function () {
            var self = this;

            self.parseHash();

            $(window).on('hashchange', function () {
                self.parseHash();
            });

            this.$modal.on('hide.bs.modal', function () {
                window.location.hash = '#/';
                self.clear();
            });
        },

        getChamado: function (id) {
            var self = this;

            $('.js-alerta-chamado').remove();

            $.get(URL + '/chamado/' + id, function (response) {
                self.setChamado(response);
            })
            .fail(function (response) {
                var error;
                var $alert = $('<div></div>');

                if (response.status === 404) {
                    error = 'Chamado #' + id + ' não existe.';
                }

                $alert.addClass('alert alert-danger js-alerta-chamado');
                $alert.html(error);
                $alert.insertBefore('.table');
            })
        },

        setChamado: function (content) {
            var $field;
            var fields;
            var key;
            var value;

            this.clear();

            this.$fields.each(function (i, field) {
                $field = $(field);
                fields = $(field).data('field').split('.');
                key    = fields[0];
                value  = fields[1];

                $field.html(content[key][value]);
            });

            this.$modal.modal('show');
        },

        parseHash: function () {
            var regex = /^chamado\/(.+)/;
            var hash  = window.location.hash.substring(2);
            var url   = 'http://' + window.location.host + window.location.pathname;
            var idChamado;

            if (regex.test(hash)) {
                idChamado = regex.exec(hash)[1];

                this.getChamado(idChamado);
            }
        },

        clear: function () {
            this.$fields.html('');
        }
    }

    $(window).on('load', function () {
        VerChamado.init();
    });
} (jQuery));
