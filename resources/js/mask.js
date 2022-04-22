$(".mask-cep").mask('99999-999')

$('.mask-fone').mask('(00) 0000-00009');

$('.mask-cpf').mask('000.000.000-00', {
    onKeyPress: function(cpfcnpj, e, field, options) {
        const masks = ['000.000.000-000', '00.000.000/0000-00'];
        const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
        $('#cpfcnpj').mask(mask, options);
    }
});

$('.mask-money').mask('000.000.000.000.000,00', { reverse: true });
$('.mask-money-value').mask('0000.00', { reverse: true });

$('.mask-data').mask('99/99/9999');

$('.mask-qtd').mask('000.000.000.000.000', { reverse: true });

$('.mask-num-cartao').mask('0000 0000 0000 0000', { reverse: true });