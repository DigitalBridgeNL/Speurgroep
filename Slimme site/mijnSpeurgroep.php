<?php
include('includes/header.php');
if ($_SESSION['myusername'] == '')
{
    echo 'the session is empty';
}
else {
?>

<div class="clear"></div>
<form>
<input type="hidden" name="user" value="<?php echo $_SESSION['myusername'] ?>" id="user" />
</form>
<script>
    $( window ).load(function() {
        loadBedrijf();
		loadLogin();
		loadBranche();
		loadPakket();
    });
</script>
<div class="section-container tabs" data-section="tabs">
  <section>
    <p class="title" data-section-title><a href="#section1">Algemeen</a></p>
    <div class="content" data-slug="section1" data-section-content>
      <p>Hier vindt u alle algemene informatie over uw speurgroep account</p>
      <div class="section-container auto" data-section>
        <section>
          <p class="title"><a href="#section1-1">Inloggegevens</a></p>
          <div class="content" id="loadLogin">
            <p>Login....</p>
          </div>
        </section>
        <section>
          <p class="title"><a href="#section1-2">Contract</a></p>
          <div class="content" id="loadContract">
            <p>Contract...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-3">Gekozenbranches</a></p>
          <div class="content" id="loadBranches">
            <p>Gekozen branches...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-4">Pakketkeuze</a></p>
          <div class="content" id="loadPakket">
            <p>Pakketkeuze...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-5">Bedrijfsgegevens</a></p>
          <div class="content" id="loadBedrijf">
            <p>Bedrijfsgegevens...</p>
          </div>
        </section>
    </div>
	</div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#">Meldingen</a></p>
    <div class="content" data-slug="section2" data-section-content>
      <p>Content of section 2.</p>
	  <div class="section-container auto" data-section>
        <section>
          <p class="title"><a href="#section2-1">Offertes</a></p>
          <div class="content">
            <p>Login....</p>
          </div>
        </section>
        <section>
          <p class="title"><a href="#section2-2">Mededelingen</a></p>
          <div class="content">
            <p>Contract...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section2-3">Nieuwsbrieven</a></p>
          <div class="content">
            <p>Gekozen branches...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section2-4">Pakketkeuze</a></p>
          <div class="content">
            <p>Pakketkeuze...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section2-5">Bedrijfsgegevens</a></p>
          <div class="content">
            <p>Bedrijfsgegevens...</p>
          </div>
        </section>
    </div>
    </div>
  </section>
</div>

<?php
include('includes/footer.php');
}
?>