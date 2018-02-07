var swiftInformaApp = (function ($) {
    return {
        uploadDocSwiftInforma: function (action, divclones, divpai) {
            var frame = null;

            $(document).on({
                click: function (e) {
                    e.preventDefault();
                    var attachment;

                    if (frame) {
                        frame.open();
                        return;
                    } else {
                        frame = wp.media({
                            title: 'Selecione ou faça upload dos arquivos (CTRL+selecione) para selecionar vários',
                            button: {
                                text: 'Vincular ao Post'
                            },
                            multiple: true  // Seta se pode ou não ser selecionado mais de um arquivo
                        });
                        frame.open();
                    }

                    frame.on('select', function () {

                        // Pegando os detalhes do arquivo que será anexado ao post
                        attachment = frame.state().get('selection').toJSON();


                        //Preenchendo os primeiros inputs com o primeiro arquivo selecionado
                        var $div = $(divpai);
                        $div.children('.link').val(attachment[0].url);
                        $div.children('.descricao_arquivo').val(attachment[0].filename);

                        //Preenchendo os demais inputs com os restantes dos arquivos
                        for (var i = 1; i < attachment.length; i++) {
                            console.log('teste', attachment[i].id);
                            var $clone = $div.clone();

                            $clone.children('input')
                                    .val('')
                                    .attr('name', function (i, val) {
                                        return val.replace(/\d/g, $(divpai).length);
                                    });

                            $clone.children('.link').removeClass('input-preview-' + ($('.arquivos').length - 1));
                            $clone.children('.link').addClass('input-preview-' + $('.arquivos').length);
                            $clone.children('.link').val(attachment[i].url);

                            $clone.children('.descricao_arquivo').removeClass('input-preview-descricao-' + ($('.arquivos').length - 1));
                            $clone.children('.descricao_arquivo').addClass('input-preview-descricao-' + $('.arquivos').length);
                            $clone.children('.descricao_arquivo').val(attachment[i].filename);

                            $clone.children('button').hide();


                            $clone.children('a').show()
                                    .removeClass('btn-download-more')
                                    .addClass('btn-download-less-swiftinforma')
                                    .children('span')
                                    .removeClass('dashicons-plus')
                                    .addClass('dashicons-minus');

                            $clone.appendTo(divclones);

                        }
                        ;
                    });
                    return false;
                }
            }, action);
        },
        removeToSwiftInforma: function (less, divpai) {
            $(document).on({
                click: function () {
                    //removendo a div mais próxima ao botão do click
                    $(this).closest(divpai).remove();
                }
            }, less);
        },
        init: function () {
            this.removeToSwiftInforma('.btn-download-less-swiftinforma', '.div-pai-swiftinforma');
            this.uploadDocSwiftInforma('.btn-service-media-swiftinforma', '#download-clones-swiftinforma', '.div-pai-swiftinforma');
        }
    }
}(jQuery));

jQuery(document).ready(function () {
    swiftInformaApp.init();
});
