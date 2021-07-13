<!-- Max Recke, Frank Guane Bi -->
<div id="explorer" class="explorer">
    
    
    <div class="mainbox" id="searchbox">
        <h3>Artikelsuche:</h3>
        <br>

        <form action="index.php" method="post">
            <input type="text" name="suchbegriff" placeholder="Suchbegriff...">
            <input type="submit" name="suchen" value="suchen">
        </form>
        
        <?php
           include_once ROOT.'/PHP/search.inc.php'; 
        ?>
        <?php if(isset($articlesearchresults)&&$articlesearchresults):?>
            <p>Artikel:</p>
            <?php foreach($articlesearchresults as $articlesearchresult):?>
                <li><a href="?articleid=<?=str_pad($articlesearchresult->Articel_id , 4, 0, STR_PAD_LEFT)?>"><?= $articlesearchresult->Articel_name?></a></li>
            <?php endforeach?>
        <?php endif?>
        <?php if(isset($articlegroupsearchresults)&&$articlegroupsearchresults):?>
            <p>Artikelgruppen:</p>
            <?php foreach($articlegroupsearchresults as $articlegroupsearchresult):?>
                <li><a href="?articlegroupid=<?=str_pad($articlegroupsearchresult->Articel_group_id , 4, 0, STR_PAD_LEFT)?>"><?= $articlegroupsearchresult->Articel_group_name ?></a></li>
            <?php endforeach?>
        <?php endif?>
        <p><?php if(isset($searchstatus)){echo $searchstatus;}?></p>
    </div>



    <div class="mainbox">
        <h3>Übersicht:</h3>

        <?php $Storages = getstorages();?>

        <?php if(!$Storages):?>
            
            <p>keine Lagerplätze gefunden</p>

        <?php  else:?>
            
            <?php foreach ($Storages as $Storage): ?>
                <br>
                <div class="explorerwrap">
                    <span class="tab0"></span>
                    <button class="explorerbutton" onclick="togglesubelements(event, 'storage<?=$Storage->Storage_id?>')">></button>
                    <li><a href="?storageid=<?=str_pad($Storage->Storage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Storage->Storage_name ?></a></li>
                </div>

                <?php $Substorages = getsubstoragesinstorage($Storage);?>
                <div id="storage<?=$Storage->Storage_id?>" class="subthing">
                    <?php if(!$Substorages):?>
                        
                        <p><span class="tab1"></span>leer</p>
                    <?php else:?>
                        
                        <?php foreach ($Substorages as $Substorage):?>
                            
                            <div class="explorerwrap">
                                <span class="tab1"></span>
                                <button class="explorerbutton" onclick="togglesubelements(event, 'Substorage<?=$Substorage->Substorage_id?>')">></button>
                                <li><a href="?substorageid=<?=str_pad($Substorage->Substorage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_name?></a></li>
                            </div>
                            
                            <?php $fixedSubstorages = getfixedubstoragesinsubstorage($Substorage);?>
                            <div id="Substorage<?=$Substorage->Substorage_id?>" class="subthing">
                                <?php if(!$fixedSubstorages):?>
                                    
                                    <p><span class="tab2"></span>leer</p>

                                <?php else:?>
                                    
                                    <?php foreach($fixedSubstorages as $fixedSubstorage):?>

                                        <div class="explorerwrap">
                                            <span class="tab2"></span>
                                            <button class="explorerbutton" onclick="togglesubelements(event, 'fixedSubstorage<?=$fixedSubstorage->Substorage_fixed_id ?>')">></button>
                                            <li ><a href="?substoragefixedid=<?=str_pad($fixedSubstorage->Substorage_fixed_id, 4, 0, STR_PAD_LEFT)?>"><?= $fixedSubstorage->Substorage_fixed_name?></a></li>
                                        </div>
                                        
                                        <?php $mobileSubstorages = getmobilesubstoragesinfixedsubstorage($fixedSubstorage);?>
                                        
                                        <div id="fixedSubstorage<?=$fixedSubstorage->Substorage_fixed_id ?>" class="subthing">
                                            <?php if(!$mobileSubstorages):?>
                                                
                                                <p><span class="tab3"></span>leer</p>

                                            <?php else:?>
                                                
                                                <?php foreach ($mobileSubstorages as $mobileSubstorage):?>

                                                    <div class="explorerwrap">
                                                        <span class="tab3"></span>
                                                        <button class="explorerbutton" onclick="togglesubelements(event, 'mobileSubstorage<?=$mobileSubstorage->Substorage_mobile_id ?>')">></button>
                                                        <li><a href="?substoragemobileid=<?=str_pad($mobileSubstorage->Substorage_mobile_id, 4, 0, STR_PAD_LEFT)?>"><?= $mobileSubstorage->Substorage_mobile_name?></a></li>
                                                    </div>
                                                    
                                                    <?php $articles = getarticlesinmobilesubstorage($mobileSubstorage);?>
                                                    <div id="mobileSubstorage<?=$mobileSubstorage->Substorage_mobile_id ?>" class="subthing">
                                                        <?php if(!$articles):?>
                                                            
                                                            <p><span class="tab4"></span>leer</p>

                                                        <?php else:?>
                                                            
                                                            <?php foreach ($articles as $article): ?>

                                                                <div class="explorerwrap">
                                                                    <span class="tab4"></span>
                                                                    <button class="explorerbutton" onclick="togglesubelements(event, 'articel<?=$article->Articel_id?>')">></button>
                                                                    <li><a href="?articleid=<?=str_pad($article->Articel_id, 4, 0, STR_PAD_LEFT)?>"><?= $article->articel_name?></a></li>
                                                                </div>
                                                            
                                                                <?php $subarticles = getsubarticlesofarticle($article->Articel_id);?>
                                                                <div id="articel<?=$article->Articel_id ?>" class="subthing">
                                                                    <?php if(!$subarticles):?>
                                                                        
                                                                        <p><span class="tab5"></span>leer</p>

                                                                    <?php else:?>
                                                                        
                                                                        <?php foreach ($subarticles as $subarticle): ?>
                                                                            <?php if($subarticle->Subarticel_quantity>0):?>
                                                                                <p><span class="tab5"></span><?=$subarticle->Subarticel_quantity?></p>
                                                                            <?php else:?>
                                                                                <p><span class="tab5"></span>leer</p>
                                                                            <?php endif?>
                                                                        <?php endforeach;?>
                                                                        
                                                                    <?php endif;?>
                                                                </div>
                                            
                                                            <?php endforeach;?>
                                                            
                                                        <?php endif;?>
                                                    </div>
                                                <?php endforeach;?>              
                                            <?php endif;?>
                                        </div>
                                    <?php endforeach;?>
                                                        
                                <?php endif;?>
                            </div> 
                        <?php endforeach;?>
                                                    
                    <?php endif;?>
                </div>                                                
            <?php endforeach;?>

        <?php endif;?>

    </div>

    <div class="mainbox">

        <h3>Artikel:</h3>

        <?php $articles = getarticles();?>

        <?php if(!$articles):?>
            <br>
            <p>keine Artikel gefunden!</p>

        <?php else:?>
            <br>
            <?php foreach ($articles as $article): ?>

                <li><a href="?articleid=<?=str_pad($article->Articel_id, 4, 0, STR_PAD_LEFT)?>"><?= $article->articel_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

    <div class="mainbox">

        <h3>Artikelgruppen:</h3>  

        <?php $articlegroups = getarticlegroups();?>

        <?php if(!$articlegroups):?>
            <br>
            <p>keine Gruppen gefunden!</p>

        <?php else:?>
            <br>
            <?php foreach ($articlegroups as $articlegroup): ?>

                <li><a href="?articlegroupid=<?=str_pad($articlegroup->Articel_group_id, 4, 0, STR_PAD_LEFT)?>"><?= $articlegroup->Articel_group_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

</div>
