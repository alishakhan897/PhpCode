<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* CSS equivalent for styled-components */
        .styled-main-div {
            width: 95%;
            padding: 25px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 45px;
            overflow: auto;
        }
        @media screen and (min-width: 768px) {
            .styled-main-div {
                justify-content: space-between;
                flex-direction: row;
                padding-top: 45px;
                padding-bottom: 45px;
            }
        }
        .image-detailed {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media screen and (min-width: 768px) {
            .image-detailed {
                width: 50%;
            }
        }
        .image-height {
            width: 100%;
            border-radius: 12px;
            margin-top: 34px;
        }
        @media screen and (min-width: 768px) {
            .image-height {
                height: 100%;
                border-radius: 20px;
            }
        }
        .detailed-main-div {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .detailed-container {
            width: 80%;
            padding: 0;
            margin-top: 0;
            padding-left: 5px;
        }
        @media screen and (min-width: 768px) {
            .detailed-container {
                width: 48%;
            }
        }
        .rspara {
            color: #12022f;
            font-weight: bold;
            font-size: 20px;
            padding-top: 25px;
        }
        .button-div {
            display: flex;
            margin-top: 20px;
        }
        .button-detailed {
            background-color: #3b82f6;
            border: 0;
            outline: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
            padding: 12px 20px;
            border-radius: 8px;
            color: white;
            margin-right: 19px;
        }
        .des {
            margin-top: 20px;
        }
        .available-para {
            font-family: Roboto;
            font-weight: bold;
            color: #12022f;
            font-size: 20px;
            padding-top: 25px;
            padding-bottom: 25px;
        }
        .bs-design {
            display: flex;
            width: 30%;
            justify-content: space-between;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .button2 {
            background-color: #3b82f6;
            border: 0;
            outline: 0;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            margin-right: 19px;
            cursor: pointer;
        }
        .similiar-product-div {
            width: 95%;
            display: flex;
            flex-wrap: wrap;
            gap: 1.8rem;
            padding: 25px;
        }
        .image-detailed2 {
            width: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        @media screen and (min-width: 768px) {
            .image-detailed2 {
                width: 30%;
            }
        }
        .image-height2 {
            width: 100%;
            border-radius: 12px;
            margin-top: 34px;
        }
        @media screen and (min-width: 768px) {
            .image-height2 {
                height: 100%;
                border-radius: 20px;
            }
        }
        .heading-div {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="root"></div>
    <script src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script type="text/babel">
        // React components

        const { useContext } = React;
        const CartContext = React.createContext();

        const Cart = () => {
            const { cartList, removeAllCartItems } = useContext(CartContext);
            const showEmptyView = cartList.length === 0;

            const RemoveAllItemInCart = () => {
                removeAllCartItems();
            };

            return (
                <>
                    <Navbar />
                    <div className="styled-main-div">
                        {showEmptyView ? (
                            <EmptyCartView />
                        ) : (
                            <div className="detailed-container">
                                <h1 className="heading-div">Shopping Cart</h1>
                                <div className="button-div">
                                    <button
                                        type="button"
                                        className="button-detailed"
                                        onClick={RemoveAllItemInCart}
                                    >
                                        Remove all
                                    </button>
                                </div>
                                <CartListView />
                                <CartSummary />
                            </div>
                        )}
                    </div>
                </>
            );
        };

        const CartItem = ({ cartItemDetails }) => {
            const { removeCartItem, incrementCartItemQuantity, decrementCartItemQuantity } = useContext(CartContext);
            const { id, title, price, imageUrl, count } = cartItemDetails;

            const onRemoveCartItemscross = () => {
                removeCartItem(id);
            };

            const OnIncreaseButton = () => {
                incrementCartItemQuantity(id);
            };

            const OnDecreaseButton = () => {
                decrementCartItemQuantity(id);
            };

            return (
                <div className="similiar-product-div">
                    <img className="image-height2" src={imageUrl} alt={title} />
                    <div className="detailed-main-div">
                        <div className="detailed-container">
                            <h1>{title}</h1>
                            <div className="bs-design">
                                <button
                                    type="button"
                                    aria-label="Increase Quantity"
                                    onClick={OnIncreaseButton}
                                >
                                    <BsPlusSquare color="#52606D" size={15} />
                                </button>
                                <p>{count}</p>
                                <button
                                    type="button"
                                    aria-label="Decrease Quantity"
                                    onClick={OnDecreaseButton}
                                >
                                    <BsDashSquare color="#52606D" size={15} />
                                </button>
                            </div>
                            <div>
                                <p>Rs {price * count} /-</p>
                                <button
                                    type="button"
                                    onClick={onRemoveCartItemscross}
                                >
                                    Remove
                                </button>
                            </div>
                        </div>
                        <button
                            type="button"
                            aria-label="Delete Item"
                            onClick={onRemoveCartItemscross}
                        >
                            <AiFillCloseCircle color="#616E7C" size={20} />
                        </button>
                    </div>
                </div>
            );
        };

        const CartListView = () => {
            const { cartList } = useContext(CartContext);

            return (
                <div>
                    {cartList.map(eachCartItem => (
                        <CartItem key={eachCartItem.id} cartItemDetails={eachCartItem} />
                    ))}
                </div>
            );
        };

        const CartSummary = () => {
            const { cartList } = useContext(CartContext);
            const cartListLength = cartList.length;
            let total = 0;
            cartList.forEach(each => {
                total += each.price * each.count;
            });

            return (
                <div className="rspara">
                    <div>
                        <h1>
                            Order Total: <span>Rs {total}/- </span>
                        </h1>
                        <p>{cartListLength} items in cart</p>
                        <button type="button" className="button2">
                            Checkout
                        </button>
                    </div>
                </div>
            );
        };

        const EmptyCartView = () => (
            <div>
                <h1>Your cart is empty</h1>
            </div>
        );

        const Navbar = () => (
            <nav>
                <h1>Navbar</h1>
            </nav>
        );

        const App = () => {
            const [cartList, setCartList] = React.useState([]);

            const removeAllCartItems = () => setCartList([]);
            const removeCartItem = (id) => setCartList(cartList.filter(item => item.id !== id));
            const incrementCartItemQuantity = (id) => {
                setCartList(cartList.map(item => item.id === id ? { ...item, count: item.count + 1 } : item));
            };
            const decrementCartItemQuantity = (id) => {
                setCartList(cartList.map(item => item.id === id ? { ...item, count: item.count - 1 } : item));
            };

            return (
                <CartContext.Provider value={{ cartList, removeAllCartItems, removeCartItem, incrementCartItemQuantity, decrementCartItemQuantity }}>
                    <Cart />
                </CartContext.Provider>
            );
        };

        ReactDOM.render(<App />, document.getElementById('root'));
    </script>
</body>
</html>
