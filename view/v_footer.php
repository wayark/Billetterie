</body>

<footer>
    <a href="?page=connection" class="footerButton"><?php if(isset($_SESSION["user"])){echo "Mon compte";} else {echo "Connexion";}?></a>
    <a href="?page=contact" class="footerButton">Contact</a>
</footer>

</html>