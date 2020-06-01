<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pricing</title>
</head>
<body>
<div class="card">
  <div class="card-body">

    <h3 class="text-center font-weight-bold blue-text mt-3 mb-4 pb-4"><strong>Slide to see the pricing change</strong></h3>
    <hr>

    <form class="range-field my-5">
      <input id="calculatorSlider" class="no-border" type="range" value="0" min="0" max="30" />
    </form>

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 text-center pb-5">

        <h2><span class="badge blue lighten-2 mb-4">You earn</span></h2>
        <h2 class="display-4" style="color:#0d47a1"><strong id="resellerEarnings">75$</strong></h2>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 text-center pb-5">

        <h2><span class="badge blue lighten-2 mb-4">Client pays</span></h2>
        <h2 class="display-4" style="color:#0d47a1"><strong id="clientPrice">319$</strong></h2>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
</body>

<script>
const slider = $("#calculatorSlider");
const developerBtn = $("#developerBtn");
const corporateBtn = $("#corporateBtn");
const privateBtn = $("#privateBtn");
const reseller = $("#resellerEarnings");
const client = $("#clientPrice");
const percentageBonus = 30; // = 30%
const license = {
  corpo: {
    active: true,
    price: 319,
  },
  dev: {
    active: false,
    price: 149,
  },
  priv: {
    active: false,
    price: 79,
  }
}

function calculate(price, value) {
  client.text((Math.round((price - (value / 100 * price)))) + '$');
  reseller.text((Math.round(((percentageBonus - value) / 100 * price))) + '$')
}

function reset(price) {
  slider.val(0);
  client.text(price + '$');
  reseller.text((Math.round((percentageBonus / 100 * price))) + '$');
}
developerBtn.on('click', function(e) {
  license.dev.active = true;
  license.corpo.active = false;
  license.priv.active = false;
  reset(license.dev.price)
});
privateBtn.on('click', function(e) {
  license.dev.active = false;
  license.corpo.active = false;
  license.priv.active = true;
  reset(license.priv.price);
});
corporateBtn.on('click', function(e) {
  license.dev.active = false;
  license.corpo.active = true;
  license.priv.active = false;
  reset(license.corpo.price);
});
slider.on("input change", function(e) {
if (license.priv.active) {
  calculate(license.priv.price, $(this).val());
} else if (license.corpo.active) {
  calculate(license.corpo.price, $(this).val());
} else if (license.dev.active) {
  calculate(license.dev.price, $(this).val());
}
})
</script>
</html>