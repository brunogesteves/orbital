<div class="fixed bottom-8 right-7 bg-slate-300 rounded-md p-2 z-50 cursor-pointer" id="scrollToUp">
    <img src="images/icons/up-arrow.svg" alt="logo" class="w-7 h-7 z-50" />
</div>

</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#scrollToUp').click(function () {
            // $(window).animate({ scrollTop: 0 }, '500');
            $(window).scrollTop(0);

        });
    });
</script>


</html>