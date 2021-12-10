<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> <?= $this->title ?> </title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <?php
            foreach($this->cssFiles as $css) {
                echo "<link href='$css'> \n";
            }
        ?>
    </head>
    <body style="padding-top: 25px">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h5>Funcionalidades</h5>
                    <div class="list-group">
                        <a href="<?= _PATH ?>" class="list-group-item list-group-item-action">Página Inicial</a>
                        <a href="<?= _PATH ?>SQL/" class="list-group-item list-group-item-action">SQL</a>
                        <a href="<?= _PATH ?>render/" class="list-group-item list-group-item-action">Render</a>
                        <a href="<?= _PATH ?>formBuilder/" class="list-group-item list-group-item-action">FormBuilder</a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <?php 
                        echo $this->contentForBody;
                        if(!empty($this->file)) 
                            include_once $this->file. ".php"; 
                        
                        echo "\n";
                    ?>
                </div>
            </div>
        </div>
    </body>
    <?php
        foreach($this->jsFiles as $js) {
            echo "<script src='$js'></script> \n";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>