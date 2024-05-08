</div>
    <div class="footer">
        <p>&copy; 2024 Enchanted Book. Semua udah di konpirmasi sama MOKLETOD.</p>
    </div>
    <script>
        function confirmLogout() {
            var logout = confirm("Kamu bakal logout nih... yakin?");
            if (logout == true) {
                window.location.href = "logout.php";
            } else {
                // Jika tidak logout, tidak melakukan apa-apa
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
