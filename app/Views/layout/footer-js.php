<!-- Required Js -->
<script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js') ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>

<?php if (isset($pc_dark_layout) && $pc_dark_layout == 'default'): ?>
<script>
    let dark_layout = 'false';
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        dark_layout = 'true';
    }
    layout_change_default();
    layout_change(dark_layout === 'true' ? 'dark' : 'light');
</script>
<?php endif; ?>


<?php if (isset($pc_dark_layout) && $pc_dark_layout != 'default'): ?>
    <?php if ($pc_dark_layout == 'true'): ?>
        <script>layout_change('dark');</script>
    <?php elseif ($pc_dark_layout == 'false'): ?>
        <script>layout_change('light');</script>
    <?php endif; ?>
<?php endif; ?>


<?php if (isset($pc_box_container)): ?>
<script>change_box_container('<?= $pc_box_container ?>');</script>
<?php endif; ?>


<?php if (isset($pc_rtl_layout)): ?>
<script>layout_rtl_change('<?= $pc_rtl_layout ?>');</script>
<?php endif; ?>


<?php if (!empty($pc_preset_theme)): ?>
<script>preset_change("<?= $pc_preset_theme ?>");</script>
<?php endif; ?>


<?php if (!empty($font_name)): ?>
<script>font_change("<?= $font_name ?>");</script>
<?php endif; ?>
