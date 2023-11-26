<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA DA OS</title>

<style type="text/css">
body { 
 widows:0;
 orphans:0; 
 font-family:Arial;
 font-size:11pt 
}
 
 h1, p 
 { 
    margin:0pt 
}

 table 
 { 
    margin-top:0pt; 
    margin-bottom:0pt 
}

 
 h1 { 
    margin-right:14.65pt;
    text-align:center; 
    page-break-inside:auto;
    page-break-after:auto;
    widows:0; 
    orphans:0; 
    font-family:Arial; 
    font-size:12pt;
    font-weight:bold; 
    color:#000000 
}
 .BodyText 
 { 
    widows:0; 
    orphans:0; 
    font-family:Arial; 
    font-size:10pt 
}

 .ListParagraph 
 { 
    widows:0; 
    orphans:0; 
    font-family:Arial; 
    font-size:11pt 
}
.TableParagraph 
{  
    widows:0; 
    orphans:0; 
    font-family:Arial; 
    font-size:11pt 
}

 .TableNormal0 { 

}
  </style>

</head>

 <body>
    <div>
    <?php $requerente = painel::buscar_id_tabelas($chamado['id_requerente'],'usuario','tb_chamados','tb_usuarios','id_requerente');
    
    ?>
 <table cellspacing="0" cellpadding="0" class="TableNormal0" style="margin-left:6.22pt; -aw-border-insideh:0.75pt single #000000; -aw-border-insidev:0.75pt single #000000; border-collapse:collapse">
    <tr style="height:10.55pt">
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top; background-color:#e6e6e6">
            <p class="TableParagraph" style="margin-left:0.5pt; text-align:center; line-height:9.6pt">
                <span style="font-size:10pt; font-weight:bold">DADOS DO </span>
                <span style="font-size:10pt; font-weight:bold; letter-spacing:-0.1pt">REQUERENTE</span>
            </p>
        </td>
    </tr>

    <tr style="height:13.4pt">
            <td style="width:36.1pt; border-style:solid; border-width:0.75pt; vertical-align:top">
                <p class="TableParagraph" style="margin-top:0.3pt; margin-right:0.05pt; margin-left:0.55pt; text-align:center; font-size:10pt">
                    <span style="font-weight:bold; letter-spacing:-0.1pt">Nome:</span> 
                </p>
            </td>

            <td colspan="6" style="width:501.05pt; border-style:solid; border-width:0.75pt; vertical-align:top">
                <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                    <span style="-aw-import:ignore"> <?php echo $requerente; ?> </span>
                </p>
            </td>
    </tr>

    <tr style="height:13.4pt">
        <td colspan="2" style="width:75.8pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="font-weight:bold; letter-spacing:-0.1pt">Departamento:  </span>
            </p>
        </td>

        <td colspan="5" style="width:461.35pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="-aw-import:ignore"> <?php echo painel::buscar_nome_setor($requerente); ?> </span>
            </p>
        </td>
    </tr>

    <tr style="height:10.55pt"><td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top; background-color:#e6e6e6">
        <p class="TableParagraph" style="margin-left:0.5pt; text-align:center; line-height:9.6pt">
        <span style="font-size:10pt; font-weight:bold">DETALHES DO </span>
        <span style="font-size:10pt; font-weight:bold; letter-spacing:-0.1pt">CHAMADO</span>
        </p></td>
    </tr>

    <tr style="height:13.4pt">
        <td style="width:36.1pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-right:0.55pt; margin-left:0.5pt; text-align:center; font-size:10pt">
                <span style="font-weight:bold; letter-spacing:-0.1pt">Título:</span>
            </p>
        </td>

        <td colspan="6" style="width:501.05pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="-aw-import:ignore"> <?php echo $chamado['titulo'] ?> </span>
            </p>
        </td>
    </tr>

    <tr style="height:13.4pt">
        <td colspan="4" style="width:109.85pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="font-weight:bold">Técnico </span>
                <span style="font-weight:bold; letter-spacing:-0.1pt">Responsável:</span>
            </p>
        </td>

        <td colspan="3" style="width:427.3pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.65pt; font-size:10pt">
                <span style="-aw-import:ignore"> <?php echo painel::buscar_id_tabelas($chamado['id_tec_atribuido'],'usuario','tb_chamados','tb_usuarios','id_tec_atribuido') ?> </span>
            </p>
        </td>
    </tr>

    <tr style="height:13.4pt">
        <td colspan="3" style="width:98.5pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="font-weight:bold">Data/Hora </span>
                <span style="font-weight:bold; letter-spacing:-0.1pt">Abertura:</span>
            </p>
        </td>

        <td colspan="2" style="width:194.85pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
                <span style="-aw-import:ignore"> <?php echo painel::formatarData($chamado['data_incial']); ?> </span>
            </p>
        </td>
            
        <td style="width:58.8pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.65pt; font-size:10pt">
                <span style="font-weight:bold; letter-spacing:-0.1pt">Conclusão:</span>
            </p>
        </td>
            
        <td style="width:183.5pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="font-size:9pt">
                <span style="font-family:'Times New Roman'; -aw-import:ignore">&#xa0;</span>
            </p>
        </td>
    </tr>

    <tr style="height:10.55pt">
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top; background-color:#e6e6e6">
            <p class="TableParagraph" style="margin-left:0.5pt; text-align:center; line-height:9.6pt">
                <span style="font-size:10pt; font-weight:bold">DESCRIÇÃO DO </span>
                <span style="font-size:10pt; font-weight:bold; letter-spacing:-0.1pt">CHAMADO</span>
            </p>
        </td>
    </tr>

    <tr style="height:13.4pt">
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:2.7pt; font-size:10pt">
            <span style="-aw-import:ignore"> <?php echo $chamado['descricao'] ?> </span>
            </p>
        </td>
    </tr>

    <tr style="height:10.55pt">
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top; background-color:#e6e6e6">
            <p class="TableParagraph" style="margin-left:0.5pt; text-align:center; line-height:9.6pt">
                <span style="font-size:10pt; font-weight:bold; letter-spacing:-0.1pt">SOLUÇÃO</span>
            </p>
        </td>
    </tr>

    <tr style="height:155.15pt">

        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
            <p class="TableParagraph" style="margin-left:2.7pt; font-size:10pt">
                <span>Descreva a </span>
                <span style="letter-spacing:-0.1pt">solução:</span>
            </p>
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
            <p class="TableParagraph" style="margin-top:2.2pt; font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>
        </td>

    </tr>

    <tr style="height:13.4pt">
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top; background-color:#e6e6e6">
            <p class="TableParagraph" style="margin-top:0.3pt; margin-left:0.5pt; text-align:center; font-size:10pt">
                <span style="font-weight:bold; letter-spacing:-0.1pt">ASSINATURAS</span>
            </p>
        </td>
    </tr>

    <tr style="height:112.6pt">   
        <td colspan="7" style="width:537.9pt; border-style:solid; border-width:0.75pt; vertical-align:top">
            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>

            <p class="TableParagraph" style="margin-top:2.55pt; font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>

            <p class="TableParagraph" style="margin-left:26.1pt; line-height:1pt">
                <span style="width:269.35pt; font-size:1pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:295.45pt">&#xa0;</span>
            </p>

            <p class="TableParagraph" style="margin-top:4pt; margin-left:5.95pt; text-align:center; font-size:7pt">
                <span style="width:261.85pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:267.8pt">&#xa0;</span>
            </p>

            <div style="text-align: center;">
                <hr style="width: 35%; border: 0.5px solid black; display: inline-block; vertical-align: top; margin-right:120px">
                <hr style="width: 35%; border: 0.5px solid black; display: inline-block; vertical-align: top;">
            </div>  
            <p class="TableParagraph" style="margin-top:6.15pt; margin-left:88.3pt; font-size:7pt">
                <span style="letter-spacing:-0.1pt">Técnico: <?php echo painel::buscar_id_tabelas($chamado['id_tec_atribuido'],'usuario','tb_chamados','tb_usuarios','id_tec_atribuido')?></span>
                <span style="width:220.64pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:346.45pt">&#xa0;</span>
                <span> Requerente: <?php echo $requerente; ?> </span>
            </p>

            <p class="TableParagraph" style="font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>

            <p class="TableParagraph" style="margin-top:6.4pt; margin-bottom:0.05pt; font-size:10pt">
                <span style="font-weight:bold; -aw-import:ignore">&#xa0;</span>
            </p>

            <p class="TableParagraph" style="margin-left:160.75pt; line-height:1pt">
                
            </p>
        </td>
    </tr>

    <tr style="height:0pt">
        <td style="width:36.85pt"> </td>
        <td style="width:39.7pt"></td>
        <td style="width:22.7pt"></td>
        <td style="width:11.35pt"></td>
        <td style="width:184.25pt"></td>
        <td style="width:59.55pt"></td>
        <td style="width:184.25pt"></td>
    </tr>
 </table>
 
 </div>
 </body>
 </html>