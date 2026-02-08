<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de IMC - RunTime Solutions</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }
    .calc-container {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 450px; /* Largura máxima em telas grandes */
    }
    h1 {
      color: #dc3545;
      font-weight: bold;
      text-align: center;
      margin-bottom: 25px;
    }
    .resultado {
      margin-top: 20px;
      padding: 15px;
      border-radius: 10px;
      background-color: #e9ecef;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center">
  <div class="calc-container">
    <h1>Calculadora de IMC</h1>

    <form method="post" action="">
      <div class="mb-3">
        <label for="peso" class="form-label">Peso (kg)</label>
        <input type="number" class="form-control" id="peso" name="peso" placeholder="Ex: 80.5" step="0.01" required>
      </div>
      <div class="mb-3">
        <label for="altura" class="form-label">Altura (m)</label>
        <input type="number" class="form-control" id="altura" name="altura" placeholder="Ex: 1.75" step="0.01" required>
      </div>
      <button type="submit" class="btn btn-primary w-100" name="calcular">Calcular IMC</button>
    </form>

    <div class="resultado">
      <?php
        if(isset($_POST['calcular'])){
          $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
          $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);

          if($peso && $altura){
            $imc = $peso / ($altura * $altura);
            $faixa = "";
            $cor = "text-dark";

            if ($imc < 18.5) { $faixa = "Abaixo do peso"; $cor = "text-warning"; }
            elseif ($imc <= 24.9) { $faixa = "Peso normal"; $cor = "text-success"; }
            elseif ($imc <= 29.9) { $faixa = "Sobrepeso"; $cor = "text-primary"; }
            elseif ($imc <= 34.9) { $faixa = "Obesidade Grau 1"; $cor = "text-danger"; }
            elseif ($imc <= 39.9) { $faixa = "Obesidade Grau 2"; $cor = "text-danger"; }
            else { $faixa = "Obesidade Grau 3"; $cor = "text-danger font-weight-bold"; }

            echo "<h5>Seu IMC é: <strong>" . number_format($imc, 2) . "</strong></h5>";
            echo "<p class='mb-0'>Classificação: <span class='$cor font-weight-bold'>$faixa</span></p>";
          } else {
            echo "Por favor, insira valores válidos.";
          }
        } else {
          echo "Preencha os campos para calcular.";
        }
      ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>