$(function() {
    $('.e_radio input[value="Citoyen"]').click(function (){
        $('.e_input_citoyen').css('display','block');
        $('.e_input_entreprise').css('display','none');
        $('.e_input_association').css('display','none');
        $('.e_input_citoyen input').val("");
    });
    $('.e_radio input[value="Association"]').click(function (){
        $('.e_input_association').css('display','block');
        $('.e_input_entreprise').css('display','none');
        $('.e_input_citoyen').css('display','none');
        $('.e_input_association input').val("");
    });
    $('.e_radio input[value="Entreprise"]').click(function (){
        $('.e_input_citoyen').css('display','none');
        $('.e_input_association').css('display','none');
        $('.e_input_entreprise').css('display','block');
        $('.e_input_entreprise input').val("");
    });
});