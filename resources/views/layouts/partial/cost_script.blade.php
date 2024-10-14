<script>
    let costEl  = document.getElementById("cost");
    let format  = Intl.NumberFormat("id");
    costEl.addEventListener("keyup",(e) => {
        let val   = e.target.value;
        val       = val.replace(/[^0-9]/g,"");
        e.target.value  = format.format(val);
    });
</script>