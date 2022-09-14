<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var string[]|\Cake\Collection\CollectionInterface $collections
 * @var string[]|\Cake\Collection\CollectionInterface $images
 */

$modalItems = $item;

?>

<section class="page-section" id="portfolio">
    <div class="container">
        <br/><br/>
        <div class="row">
            <h2 class="section-heading text-uppercase col">Gallery</h2>
            <form method="get" accept-charset="utf-8" action=
                <?= $this->Url->build(['controller' => 'items', 'action' => 'gallery',])?>>
                <div class="row align-items-stretch">
                    <div class="col-md-4">
                        <label class="pb-1" for="key">Search for:</label>
                        <div class="input text">
                            <input class="form-control" name="key" id="key" type="text" placeholder="Item name...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="pb-1" for="sort_by">Collection:</label>
                            <select class="form-select" name="collection" id="collection">
                                <option  value="All">All</option>
                                <option  value="2020 Masterworks">2020 Masterworks</option>
                                <option  value="The Orb Collection">The Orb Collection</option>
                            </select>
                    </div>
                    <div class="col-md-2">
                        <label class="pb-1" for="sort_by">Order by:</label>
                        <select class="form-select" name="sort_by" id="sort_by">
                            <option value="" selected disabled hidden></option>
                            <option  value="price">Price</option>
                            <option  value="date_of_creation">Date Created</option>
                            <option  value="name">Alphabetical Order</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <br/>
                        <button class="btn btn-primary btn-l text-uppercase mt-1" name="search" id="search" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <br/>
        <?php if ($this->request->getQuery('key')){
            ?>
            <div class="row">
                <div class="col-md-auto">Search results for: <?= $this->request->getQuery('key') ?></div>
                <div class="col align-content-left">
                    <?= $this->Html->link('Clear Search', array(
                        'controller' => 'items',
                        'action' => 'gallery'
                    )); ?>
                </div>
            </div>
        <?php } ?>
        <br/>
        <?php if ($this->request->getQuery('result') == 'success'){
            ?>
            <div class="text-center">Thank you! Your invoice request has been submitted.</div>
            <div class="text-center">Please wait for our staff to process your request.</div>
            <br/>
        <?php } ?>

        <div class="row">
            <?php
            foreach ($item->all() as $item) {
                ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?= $item->id ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="../productimages/thumbnails/GlassArt<?= $item->id ?>.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= h($item->name) ?></div>
                            <!--<div class="portfolio-caption-subheading text-muted">Collection</div>-->
                            <?php if ($item->for_sale){ ?>
                                <div>
                                    $<?= h($item->price) ?>
                                </div>
                                <form method="post" action="../Transactions/invoice">
                                    <input hidden type="text" id="item_id" name="item_id" value="<?= $item->id ?>">
                                    <input hidden type="text" id="price" name="price" value="<?= $item->price ?>">
                                    <button class="btn btn-primary btn-l text-uppercase" type="submit">Purchase</button>

                                </form>
                            <?php } else { ?>
                                <div>$<?= h($item->price) ?></div>
                                <button class="btn btn-primary btn-l text-uppercase disabled" type="button">
                                    Unavailable
                                </button>
                            <?php } ?>

                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php foreach ($modalItems as $item) {
    ?>
    <div class="portfolio-modal modal fade" id="portfolioModal<?= $item->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="../assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Item details-->
                                <h2 class="text-uppercase"><?= $item->name ?></h2>
                                <img class="img-fluid d-block mx-auto" src="../productimages/thumbnails/GlassArt<?= $item->id ?>.jpg" alt="..." />
                                <p><?= $item->description ?></p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Price: $</strong>
                                        <?= $item->price ?>
                                    </li>
                                    <li>
                                        <strong>Date Created:</strong>
                                        <?= $item->date_of_creation ?>
                                    </li>
                                </ul>
                                <!--<button href="../Transactions/invoice" type="button">
                                    Request Invoice
                                </button>-->
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Return to Gallery
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>


