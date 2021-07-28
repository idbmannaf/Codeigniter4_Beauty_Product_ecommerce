<?php echo view('front/lib/header');?>

    <!-- Main Content - start -->
    <main>
        <section class="container">
<?php echo $this->renderSection('content') ?>
            <!-- Quick View Product - end -->
        </section>
    </main>
    <!-- Main Content - end -->


    <!-- Footer - start -->
<?php echo view('front/lib/footer')?>