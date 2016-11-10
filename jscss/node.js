const express = require('express')
const QRious = require('qrious')

const app = express()

app.get('/qr', (req, res) => {
  const qr = new QRious({ value: 'https://neocotic.com/qrious' })

  res.end(new Buffer(qr.toDataURL(), 'base64'))
})

app.listen(3000)