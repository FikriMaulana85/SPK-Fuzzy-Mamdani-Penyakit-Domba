<script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url(); ?>assets/extensions/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/parsley.js"></script>
<script src="//cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url(); ?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let choices = document.querySelectorAll('.choices');
    let initChoice;
    for (let i = 0; i < choices.length; i++) {
        if (choices[i].classList.contains("multiple-remove")) {
            initChoice = new Choices(choices[i], {
                delimiter: ',',
                editItems: true,
                maxItemCount: -1,
                removeItemButton: true,
            });
        } else {
            initChoice = new Choices(choices[i]);
        }
    }
</script>