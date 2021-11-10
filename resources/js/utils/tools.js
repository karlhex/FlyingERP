import Decimal from 'decimal.js'

export function amountString(amt, align='left', length=13, dec=2) {

  const a = new Decimal(amt)

  console.log('amuont', a.toFixed(2))
}
