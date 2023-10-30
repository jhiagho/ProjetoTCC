<?php
    include('/xampp/htdocs/ProjetoTCC/classes/painel.php');
    $aux = new painel();
    global $chamado;

    $chamado = $aux::BuscarChamados($_GET['chamado']);


    //Autoload do Composer
    // Comando: composer install, composer requiser dompdf/dompdf
    require '/xampp/htdocs/vendor/autoload.php';

    use Dompdf\Dompdf;
    use Dompdf\Options;
    
    $options = new Options();
    $options->setChroot(__DIR__);


    $dompdf = new Dompdf($options);

    include(__DIR__.'/Arquivo_os.php');

    $html = ob_get_clean();
    $dompdf->loadHtml($html);

    //Rederizar o Arquivo
    $dompdf->render();

    //Mostra na tela o arquivo em pdf.
    header('Content-type: application/pdf');
    echo $dompdf->output();


?>