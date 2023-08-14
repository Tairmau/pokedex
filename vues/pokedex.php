<section>
    <div class="container">
        <div class="left">
            <div class="backimg">
                <?php
                    foreach($infos as $info)
                    {
                        echo "<img src='../images/".$info['photo']."'>";

                    }
                ?>
            </div>
            <div class="type">
            <?php
                    foreach($infos as $info)
                    { ?>
                        
                        <div class="type1"><?php echo $info['type1']; ?></div>
                        <?php
                            if($info['type2']){ ?>
                                <div class="type2"><?php echo $info['type2'];?></div>
                            <?php
                                }
                            ?>
                        
                <?php
                       
                    }
                ?>
            </div>
            <div class="description">
                <?php
                    foreach($infos as $info)
                    {
                        echo $info['description'];
                    }
                ?>
            </div>
        </div>
        <div class="right">
            <div class="liste">
                <h1>151 POKEMON</h1>
                <?php

                    $pdo = PdoPokedex::getPdoPokedex();

                    $lespokemon = $pdo->pokemon();
                    foreach($lespokemon as $lepokemon)
                    { 
                        $id = $lepokemon['id'];
                        $pokemonName = $lepokemon['pokemonName']; 

                        ?>

                        <div class="id"><p><?php echo $id ?>.</p></div>

                        
                        <div class="nom"><a href="index.php?pokedex&action=pokeinfo&name=<?php echo $pokemonName ?>"><?php echo $pokemonName ?></a></div>

                <?php
                    }
                ?>
            </div>    
        </div>
    </div>
</section>