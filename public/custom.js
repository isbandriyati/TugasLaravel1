document.addEventListener("DOMContentLoaded", function() {
    const priceSlider = document.getElementById("priceSlider");
    const priceMin = document.getElementById("priceMin");
    const priceMax = document.getElementById("priceMax");
    const realPrice = document.getElementById("realPrice");

    // Menampilkan harga secara real-time saat slider digerakkan
    priceSlider.addEventListener("input", function() {
        let value = priceSlider.value;
        priceMin.textContent = value;  // Menampilkan harga minimum
        priceMax.textContent = value;  // Menampilkan harga maksimum
        realPrice.textContent = value.toLocaleString();  // Menampilkan harga terpilih secara real-time
    });
});
