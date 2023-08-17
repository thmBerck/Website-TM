const express = require('express');
const app = express();
const mongoose = require('mongoose');
const User = require('./models/user');
const Product = require('./models/product');
const Validator = require('validatorjs');

app.use(express.json())


const { MongoClient, ServerApiVersion } = require('mongodb');
const uri = "mongodb+srv://tBerck:nCVJJWFVvcXY3Eu@odin.4b2se3y.mongodb.net/Odin?retryWrites=true&w=majority";

mongoose.connect(uri, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('Connected to MongoDB'))
  .catch(err => console.error('Failed to connect to MongoDB', err));




app.get('/', (req, res) => {
    res.send("Odin is keeping a thight eye!");
})

app.listen(3000, () => {
    console.log('============== Odin =============');
    console.log('REST Api is running on port 3000.');
})

// Validation
const productValidation = {
    ean: 'required|string|size:13',
    title: 'string',
    description: 'string',
    webshop: 'required|string|in:Amazon,Bol,Coolblue,Apple', 
    price: 'numeric'
}
const userValidation = {
    firstname: 'string',
    lastname: 'string', 
    username: 'string',
    password: 'string',
}
const validator = (req,  res, next, validationRules) => {
    const validation = new Validator(req.body, validationRules);
    if (validation.fails()) {
        return res.status(400).json(validation.errors.all());
    }
    next();
}
const validateProduct = (req, res, next) => {
    validator(req, res, next, productValidation)
}
const validateUser = (req, res, next) => {
    validator(req, res, next, userValidation)
}


// USER CRUD

// Read all users
app.get('/users', async(req, res) => {
    try { 
        const users = await User.find({});

        if(!users) {
            res.status(404).json({message: `Could not find any user instance in the database.`})
        }
        res.send(users);
    } catch(error) {
        res.status(505).json({message: error.message})
    }
})

// Read all returning values after you have searched for a value on one field
app.get('/user/search', async(req, res) => {
    const data = req.body;
    try { 
        const users = await User.find(data);

        if(users.length === 0) {
            return res.status(404).json({message: `Could not find any user instance in the database.`})
        }
        res.send(users);
    } catch(error) {
        res.status(505).json({message: error.message})
    }
})

// Create a user.
app.post('/user', validateUser, (req, res) => {
    const data = req.body;

    const newUser = new User({
        firstname: data.firstname,
        lastname: data.lastname,
        email: data.email,
        username: data.username,
        password: data.password,
    })
    newUser.save().then(() => console.log('User has been saved to the database.'));

    res.send("User has been saved.");
})


//Update a user.
app.put('/user/:id', validateUser, async(req, res) => {
    const {id} = req.params;
    const data = req.body;
    try{
        const user= await User.findByIdAndUpdate(id, data, {new:true});

        if(!user) {
            return res.status(404).json({message: `Cannot find any user with ID ${id}`})
        }
        res.status(200).json(user);
    } catch (error) {
        res.status(500).json({message: error.message})
    }
})

//Delete a user.
app.delete('/user/:id', async(req, res) => {
    const {id} = req.params;
    try{
        const user= await User.findByIdAndDelete(id);

        if(!user) {
            return res.status(404).json({message: `Cannot find any user with ID ${id}`})
        }
        res.status(200).json(user);
    } catch (error) {
        res.status(500).json({message: error.message})
    }
})

// PRODUCT CRUD

// Read all products
app.get('/products', async(req, res) => {
    try { 
        const products = await Product.find({});

        if(products.length === 0) {
            return res.status(404).json({message: `Could not find any product instance in the database.`})
        }
        res.send(products);
    } catch(error) {
        res.status(505).json({message: error.message})
    }
})

// Read all returning values with limit and offset
app.get('/product/price/:offset/:limit', async(req, res) => {
    const {offset} = req.params;
    const {limit} = req.params;
    try {
        const products = await Product.find({price: {$gte: offset, $lte: limit}});

        if(products.length === 0) {
            return res.status(404).json({message: `Could not find any product in the range.`});
        } 
        res.send(products);
    }catch (err) {
        res.status(500).json({message: error.message}) 
    }
})

// Read all returning values after you have searched for a value on one field
app.get('/product/search', async(req, res) => {
    const data = req.body;
    try { 
        const products = await Product.find(data);

        if(products.length === 0) {
            return res.status(404).json({message: `Could not find any product instance in the database.`})
        }
        res.send(products);
    } catch(error) {
        res.status(505).json({message: error.message})
    }
})

//Create a product.
app.post('/product', validateProduct, (req, res) => {
    const data = req.body;

    const newProduct = new Product({
        ean: data.ean,
        title: data.title,
        description: data.description,
        webshop: data.webshop,
        price: data.price,
    })
    newProduct.save().then(() => console.log('Product has been saved to the database.'));

    res.send("Product has been saved.");
})

//Update a product.
app.put('/product/:id', validateProduct, async(req, res) => {
    const {id} = req.params;
    const data = req.body;
    try{
        const product= await Product.findByIdAndUpdate(id, data, {new:true});

        if(!product) {
            return res.status(404).json({message: `Cannot find any product with ID ${id}`})
        }
        res.status(200).json(product);
    } catch (error) {
        res.status(500).json({message: error.message})
    }
})
//Delete a product.
app.delete('/product/:id', async(req, res) => {
    const {id} = req.params;
    try{
        const product= await Product.findByIdAndDelete(id);

        if(!product) {
            return res.status(404).json({message: `Cannot find any product with ID ${id}`})
        }
        res.status(200).json(product);
    } catch (error) {
        res.status(500).json({message: error.message})
    }
})
