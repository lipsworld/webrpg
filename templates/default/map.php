<?php layout('layouts/game'); ?>
<?php section('title') ?>
<?= _('Map') ?>
<?php section('title') ?>
<?php section('styles') ?>

<?php section('styles') ?>
<?php require_once __DIR__ . '/../partials/navigationSection.php'; ?>
<?php section('content') ?>
<div class="col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= _('Actions') ?>
        </div>
        <div class="panel-body">

        </div>
    </div>

</div>
<div class="col-lg-8 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= $location ?> (<?= $activeCharacter['x'] ?>/<?= $activeCharacter['y'] ?>)
        </div>
        <div class="panel-body">

            <div class="viewport">
                <div class="arrows">
                    <div class="north"><a href="character/move/north" data-direction="north"
                                          class="glyphicon glyphicon-chevron-up"></a>
                    </div>
                    <div class="east"><a href="character/move/east" data-direction="east"
                                         class="glyphicon glyphicon-chevron-right"></a>
                    </div>
                    <div class="south"><a href="character/move/south" data-direction="south"
                                          class="glyphicon glyphicon-chevron-down"></a>
                    </div>
                    <div class="west"><a href="character/move/west" data-direction="west"
                                         class="glyphicon glyphicon-chevron-left"></a>
                    </div>
                </div>
                <div class="mapWrapper"
                     style="margin-left:-<?= ~~(($tile['width'] * $viewPort['width']) / 2) ?>px;width:<?= $tile['width'] * $viewPort['width'] ?>px;height: <?= $tile['height'] * $viewPort['height'] ?>px ">
                    <?php foreach ($map as $name => $mapData): ?>
                        <div class="map <?= $name ?>">
                            <?php for ($y = 0; $y < $viewPort['height']; $y++): ?>
                                <?php for ($x = 0; $x < $viewPort['width']; $x++):
                                    $dataKey = $viewPort['width'] * $y + $x;
                                    $data = isset($mapData[$dataKey]) ? $mapData[$dataKey] : null;
                                    ?>
                                    <?php if(!$data){ continue;}?>
                                    <div style="height:<?= $tile['height'] ?>px;width:<?= $tile['width'] ?>px;left:<?= $x * $tile['width'] ?>px;top:<?= $y * $tile['height'] ?>px<?= (isset($data['position'])) ? ';background-position:' . $data['position'] : '' ?><?= (isset($data['size'])) ? ';background-size:' . $data['size'] : '' ?>"
                                         class="tile<?= (isset($data['tileSetName'])) ? ' ' . $data['tileSetName'] : '' ?> <?= isset($data['coordinates'])?sprintf('Y%dX%d',$data['coordinates']['y'],$data['coordinates']['x']):''?>">
                                        <?php if (isset($data['partial'])) require_once __DIR__ . '/../partials/' . $data['partial'] . '.php'; ?>

                                    </div>
                                <?php endfor; ?>
                            <?php endfor; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

    </div>
</div>
<?php section('content') ?>
<?php section('scripts') ?>


<script>

    var viewPortWidth = <?= $viewPort['width']; ?>;
    var viewPortHeight =  <?= $viewPort['height'] ?>;
    var tileHeight = <?= $tile['height']?>;
    var tileWidth = <?= $tile['width'] ?>;
</script>
<script src="assets/js/map.js"></script>
<?php section('scripts') ?>

<?php layout('layouts/game'); ?>
