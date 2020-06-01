<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,500,800);
@import url(https://fonts.googleapis.com/css?family=Montserrat:800);
.snip1214 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #000000;
  text-align: center;
  font-size: 16px;
  width: 100%;
  max-width: 1000px;
  margin: 40px 15px;
}
.snip1214 .plan {
  margin: 0;
  width: 25%;
  position: relative;
  float: left;
  background-color: #ffffff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
.snip1214 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.snip1214 header {
  position: relative;
}
.snip1214 .plan-title {
  position: relative;
  top: 0;
  font-weight: 800;
  padding: 5px 15px;
  margin: 0 auto;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  margin: 0;
  display: inline-block;
  background-color: #222f3d;
  color: #ffffff;
  text-transform: uppercase;
}
.snip1214 .plan-cost {
  padding: 0px 10px 20px;
}
.snip1214 .plan-price {
  font-family: 'Montserrat', Arial, sans-serif;
  font-weight: 800;
  /* font-size: 2.4em; */
  font-size: 1.4em;
  color: #34495e;
}
.snip1214 .plan-type {
  opacity: 0.6;
}
.snip1214 .plan-features {
  padding: 0;
  margin: 0;
  text-align: center;
  list-style: outside none none;
  font-size: 0.8em;
}
.snip1214 .plan-features li {
  border-top: 1px solid #d2d7e2;
  padding: 10px 5%;
}
.snip1214 .plan-features li:nth-child(even) {
  background: rgba(0, 0, 0, 0.08);
}
.snip1214 .plan-features i {
  margin-right: 8px;
  opacity: 0.4;
}
.snip1214 .plan-select {
  border-top: 1px solid #d2d7e2;
  padding: 10px 10px 0;
}
.snip1214 .plan-select a {
  background-color: #222f3d;
  color: #ffffff;
  text-decoration: none;
  padding: 0.5em 1em;
  -webkit-transform: translateY(50%);
  transform: translateY(50%);
  font-weight: 800;
  text-transform: uppercase;
  display: inline-block;
}
.snip1214 .plan-select a:hover {
  background-color: #46627f;
}
.snip1214 .featured {
  margin-top: -10px;
  background-color: #34495e;
  color: #ffffff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
  z-index: 1;
}
.snip1214 .featured .plan-title,
.snip1214 .featured .plan-price {
  color: #ffffff;
}
.snip1214 .featured .plan-cost {
  padding: 10px 10px 20px;
}
.snip1214 .featured .plan-features li {
  border-top: 1px solid rgba(255, 255, 255, 0.4);
}
.snip1214 .featured .plan-select {
  padding: 20px 10px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.4);
}
@media only screen and (max-width: 767px) {
  .snip1214 .plan {
    width: 50%;
  }
  .snip1214 .plan-title,
  .snip1214 .plan-select a {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  .snip1214 .plan-cost,
  .snip1214 .featured .plan-cost {
    padding: 20px 10px 20px;
  }
  .snip1214 .plan-select,
  .snip1214 .featured .plan-select {
    padding: 10px 10px 10px;
  }
  .snip1214 .featured {
    margin-top: 0;
  }
}
@media only screen and (max-width: 440px) {
  .snip1214 .plan {
    width: 100%;
  }
}

    </style>
</head>
<body>

<div class="snip1214">
  <div class="plan">
    <h3 class="plan-title">
      Starter
    </h3>
    <div class="plan-cost"><span class="plan-price">10,000 ฿</span><span class="plan-type">/ Monthly</span></div>
    <ul class="plan-features">
      <li><i class="ion-checkmark"> </i>จำนวนผู้ชมพร้อมกัน 300</li>
      <li><i class="ion-checkmark"> </i>Bit Rate 512 Kbps</li>
      <li><i class="ion-checkmark"> </i>Unlimited Data Transfer</li>
      <li><i class="ion-checkmark"> </i>ดูบนคอมพิวเตอร์ </li>
      <li><i class="ion-checkmark"> </i>ดูบน iphone</li>
      <li><i class="ion-checkmark"> </i>ดูบน Android</li>
      <li><i class="ion-checkmark"> </i>24/7 Tech Support</li>
    </ul>
    <div class="plan-select"><a href="">Select Plan</a></div>
  </div>
  <div class="plan">
    <h3 class="plan-title">
      Basic
    </h3>
    <div class="plan-cost"><span class="plan-price">14,000 ฿</span><span class="plan-type">/ Monthly</span></div>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>จำนวนผู้ชมพร้อมกัน 500</li>
      <li><i class="ion-checkmark"> </i>Bit Rate 1 Mbps</li>
      <li><i class="ion-checkmark"> </i>Unlimited Data Transfer</li>
      <li><i class="ion-checkmark"> </i>ดูบนคอมพิวเตอร์ </li>
      <li><i class="ion-checkmark"> </i>ดูบน iphone</li>
      <li><i class="ion-checkmark"> </i>ดูบน Android</li>
      <li><i class="ion-checkmark"> </i>24/7 Tech Support</li>
    </ul>
    <div class="plan-select"><a href="">Select Plan</a></div>
  </div>
  <div class="plan featured">
    <h3 class="plan-title">
      Professional
    </h3>
    <div class="plan-cost"><span class="plan-price">20,000 ฿</span><span class="plan-type">/ Monthly</span></div>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>จำนวนผู้ชมพร้อมกัน 1,000</li>
      <li><i class="ion-checkmark"> </i>Bit Rate 4 Mbps</li>
      <li><i class="ion-checkmark"> </i>Unlimited Data Transfer</li>
      <li><i class="ion-checkmark"> </i>ดูบนคอมพิวเตอร์ </li>
      <li><i class="ion-checkmark"> </i>ดูบน iphone</li>
      <li><i class="ion-checkmark"> </i>ดูบน Android</li>
      <li><i class="ion-checkmark"> </i>24/7 Tech Support</li>
    </ul>
    <div class="plan-select"><a href="">Select Plan</a></div>
  </div>
  <div class="plan">
    <h3 class="plan-title">
      Ultra
    </h3>
    <div class="plan-cost"><span class="plan-price">39,000 ฿</span><span class="plan-type">/ Monthly</span></div>
    <ul class="plan-features">
    <li><i class="ion-checkmark"> </i>จำนวนผู้ชมพร้อมกัน 2000</li>
      <li><i class="ion-checkmark"> </i>Bit Rate 6 Mbps</li>
      <li><i class="ion-checkmark"> </i>Unlimited Data Transfer</li>
      <li><i class="ion-checkmark"> </i>ดูบนคอมพิวเตอร์ </li>
      <li><i class="ion-checkmark"> </i>ดูบน iphone</li>
      <li><i class="ion-checkmark"> </i>ดูบน Android</li>
      <li><i class="ion-checkmark"> </i>24/7 Tech Support</li>
    </ul>
    <!-- <div class="plan-select"><button type="submit" class="plan-select" href="/">Send</button></div> -->
    <div class="plan-select"><a href="">Select Plan</a></div>
  </div>
</div>
</body>
</html>