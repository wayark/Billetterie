const pricings = document.getElementById("pricings");
const lastPricingId = document.getElementById("last-pricing-id");
let lastId = 1;

function addPricing() {
    const pricing = document.getElementById("example-pricing").cloneNode(true);
    const childs = pricing.childNodes;
    childs[3].name = "pricing-name-" + lastId;
    childs[5].name = "pricing-price-" + lastId;
    lastId++;
    lastPricingId.value = lastId;
    pricings.append(pricing);
}