;(function ($) {
    'use strict';

    var CadastrarChamado = {
        $form: $('.js-cadastrar-chamado'),
        $button: $('.ladda-button'),
        ladda: '',

        init: function () {
            var self = this;

            this.ladda = this.$button.ladda();

            this.$form.on('submit', function (event) {
                var $this = $(this);

                event.preventDefault();

                self.$form.addClass('is-loading');

                self.ladda.ladda('start');

                self.send({
                    url: $this.attr('action'),
                    data: $this.serializeArray()
                });
            });
        },

        send: function (atts) {
            var self = this;

            this.clearErrors();

            $.ajax({
                url: atts.url,
                data: atts.data,
                type: 'POST',
            })
            .error(function (response) {
                var errors = $.parseJSON(response.responseText);

                self.error(errors);
            })
            .success(function (response) {
                self.success(response);
            })
            .complete(function () {
                self.$form.removeClass('is-loading');
                self.ladda.ladda('stop');
            });
        },

        success: function (success) {
            this.clearInputs();

            this.$form.parent().find('.alert').remove();

            var $success = $('<div></div>');

            $success.addClass('alert alert-success');
            $success.html(success);
            $success.insertBefore(this.$form.selector);
        },

        error: function (errors) {
            var self = this;
            var $input;
            var $inputGroup;
            var field;

            $.each(errors, function (field, error) {
                field = field.replace('.', '-');

                $input = $('#' + field);
                $inputGroup = $input.parent();

                $inputGroup.addClass('has-error');

                self.createError($inputGroup, error);
            });
        },

        clearErrors: function () {
            this.$form.find('.has-error').removeClass('has-error');
            this.$form.find('.help-block').remove();
        },

        createError: function ($inputGroup, error) {
            var $errorElement = ($inputGroup.find('.help-block').length > 0)
                ? $($inputGroup.find('.help-block'))
                : $('<span class="help-block"></span>');

            $errorElement.html(error);
            $errorElement.appendTo($inputGroup);
        },

        clearInputs: function () {
            this.$form[0].reset();
        }
    };

    $(window).on('load', function () {
        CadastrarChamado.init();
    });
} (jQuery));
