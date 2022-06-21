<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (event) {
        $('#relatorioList').dataTable();
    });
</script>
<style>
    .abaForm{
        padding: 15px;
        position: relative;
    }

    .abaForm{
        width: 45%;
    }

    .interna{
        padding: 5px;
        background-color: white !important;
    }

</style>
<div id="aba_relatorio" class="abaForm" style="padding-bottom: 100px;">
    
    <div id="divTableRelatorio">
        <table id="relatorioList" width="100%">
            <thead>
                <tr>
                    <td>Locação</td>
                    <td>Preço</td>
                    <td>Alugueis no mês</td>
                    <td>Valor Arrecadado</td>
                </tr>
            </thead>
            <tbody>
                    <?php
                        
                        $locacoes = aluguelController::getRelatorio();
                        
                        foreach (json_decode($locacoes) as $local){
                            echo '<tr>';
                            echo "  <td>$local->nome</td>";
                            echo "  <td>$local->preco</td>";
                            echo "  <td>$local->qtd</td>";
                            $ganho = $local->qtd * $local->preco;
                            $g = number_format((float)$ganho, 2, ',', '');
                            echo "  <td>$g</td>";
                            echo '</tr>';
                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>


