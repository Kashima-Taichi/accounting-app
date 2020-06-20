new Vue({
    el: '#copy-command',
    methods: {
        container: function () {
            var copyTargetContainer = document.querySelector("#enter-container-command");
            copyTargetContainer.select();
            document.execCommand("Copy");
            alert('entering container command copied!');
        },
        dump: function () {
            var copyTargetDump = document.querySelector("#dump-sql-command");
            copyTargetDump.select();
            document.execCommand("Copy");
            alert('dumping database command copied!');
        }
    }
})