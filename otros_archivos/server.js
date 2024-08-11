const express = require('express');
const app = express();
const port = 3000;

// Middleware para parsear el cuerpo de las solicitudes
app.use(express.urlencoded({ extended: true }));

// Ruta para procesar el formulario de registro
app.post('/register', (req, res) => {
  // Obtener los datos del formulario
  const { name, email, password } = req.body;

  // Realizar las acciones necesarias en el backend
  // (guardar los datos en una base de datos, enviar un correo electrónico, etc.)

  // Redirigir al usuario a una página de éxito o enviar una respuesta JSON
  res.redirect('/success');
});

// Iniciar el servidor
app.listen(port, () => {
  console.log(`Servidor iniciado en el puerto ${port}`);
});