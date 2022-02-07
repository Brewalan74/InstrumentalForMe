    <?php
    $terms = get_terms(array(
        'taxonomy' => 'instrument',
        'hide_empty' => false,
    ));
    ?>

    <!-- Content section -->
    <?php
    for ($i = 0; $i < count($terms); $i++) :
        $taxonomyImageData = get_field('picture', 'instrument_' . $terms[$i]->term_id);
        $taxonomyImage = $taxonomyImageData['url'];
    ?>
        <section class="instrument-container">
            <div class="container px-5">
                <div class="row gx-5 align-items-center instrument">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5 instrument__picture" style="background-image: url(<?= $taxonomyImage; ?>)"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 instrument__description">
                        <div class="p-5">
                            <h2 class="display-4"><a href="<?= get_term_link($terms[$i]->term_id); ?>"><?= $terms[$i]->name; ?></a></h2>
                            <p><?= substr($terms[$i]->description, 0, 500) . '...'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endfor; ?>