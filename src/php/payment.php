<?php 
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  include("head.php");
?>

<body>
  <main>
    <!-- Carte bancaire -->
    <article id="card">
      <div id="card-content">
        <!-- Partie avant de la carte -->
        <div class="card-body" alt="Image de la carte">
          <!-- Logos -->
          <img id="chip" src="../img/Card/chip.png" alt="">
          <img id="visa-front" src="../img/Card/visa.png" alt="">
          
          <!-- Numéro de carte -->
          <div class="card-number">
            <input id="numcard" name="numcard" type="text" value="####    ####    ####    ####" readonly>
          </div>
  
          <!-- Nom du propriétaire -->
          <div class="card-person">
            <label for="fullname">Nom du propriétaire</label>
            <input type="text" id="fullname" name="fullname" value="NOM COMPLET" readonly>
          </div>
  
          <!-- Date d'expiration -->
          <div class="card-person card-expiration">
            <label for="expiration">Date d'expiration</label>
            <input type="month" id="expiration" name="expiration" value="MM/YYYY" readonly>
          </div>
        </div>

        <!-- Partie arrière de la carte -->
        <div class="card-body card-back">
          <!-- CVV -->
          <div class="CVV">
            <p>CVV</p>
            <div id="blank">
              <p id="CVV"></p>
            </div>
          </div>
          <img id="visa-back" src="..:img/Card/visa.png" alt="">
        </div>
      </div>
    </article>

    <!-- Formulaire -->
    <form id="form" name="myForm">
      <div>
        <!-- Numéro de carte -->
        <label for="form-number">Numéro de carte</label>
        <input type="text" id="form-number" name="form-number" minlength="16" maxlength="16" onfocus="addStyle(1)" onblur="removeStyle(1)" oninput="restrictToNumbers(this); fillNumber()" required autocomplete="off">

        <!-- Nom du propriétaire -->
        <label for="form-person">Nom du propriétaire</label>
        <input type="text" id="form-person" name="form-person" maxlength="29" onfocus="addStyle(2)" onblur="removeStyle(2)" oninput="fillName()" required autocomplete="off">

        <!-- Date d'expiration et CVV -->
        <div id="form-bottom">
          <div>
            <label id="label-month" for="form-month">Date d'expiration</label>
            <label id="label-CVV" for="form-CVV">CVV</label>
          </div>
          <div>
            <div>
              <!-- Champ du mois -->
              <select class="form-date" name="form-month" onfocus="addStyle(3)" onblur="removeStyle(3)" oninput="fillMonth()" required>
                <option value="" disabled selected>Mois</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>

                <!-- Champ de l'année -->
                <select class="form-date" name="form-year" onfocus="addStyle(3)" onblur="removeStyle(3)" oninput="fillYear()" required>
                <option value="" disabled selected>Année</option>
                </select>
            </div>

            <!-- Champ du CVV -->
            <input type="text" id="form-CVV" name="form-CVV" minlength="3" maxlength="3" oninput="restrictToNumbers(this); fillCVV();" required autocomplete="off">
          </div>
        </div>

        <!-- Bouton de paiement -->
        <button class="expand" onclick="checkForm(event)">
          Payer
          <span class="expand-icon expand-hover">
            <svg class="first" xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 32 32" version="1.1">
              <path d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z" />
            </svg>
            <span class="loader"></span>
            <svg class="second" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 5L8 15l-5-4" />
            </svg>
          </span>
        </button>
      </div>
    </form>
  </main>

  <!-- Appel du code js pour faire une rotation de la carte -->
  <script src="../js/rotate.js"></script>
</body>