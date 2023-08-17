const mongoose = require('mongoose');

const ProductSchema = new mongoose.Schema({
    ean: String,
    title: String,
    description: String,
    webshop: String,
    price: Number,
});

const Product = mongoose.model('Product', ProductSchema);

module.exports = Product;