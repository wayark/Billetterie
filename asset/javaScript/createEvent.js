const pricings = document.getElementById("pricings");
const lastPricingId = document.getElementById("max-pricing-id");
let lastId = 1;

function addPricing() {
    const pricing = document.getElementById("example-pricing").cloneNode(true);
    const childs = pricing.childNodes;
    console.log(childs);
    childs[1].style.display = "inline-block";
    childs[5].name = "pricing-name-" + lastId;
    childs[7].name = "pricing-price-" + lastId;
    childs[9].name = "pricing-description-" + lastId;
    lastId++;
    lastPricingId.value = lastId;
    pricings.append(pricing);
}

function removePricing(event) {
    let element = event.target.parentNode;
    element.remove();
}