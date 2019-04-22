# Gold Price (RM) form Kijang Emas Bank Negara Malaysia (BNM)
Gold Price data is pulled from [Kijang Emas](https://api.bnm.gov.my/portal#operation/KELatest). This code is only for demo on BNM API usage.

## Result Example
Please refer [http://gold.decoweb.space/](http://gold.decoweb.space/) for live code execution.
```html
<p><strong>Price for date:</strong> 2019-04-19</br><strong>Last update:</strong> 2019-04-19 10:00:02</p><p><strong>BNM Data</strong><br>1g (Buying): RM190.00<br>1g (Sell): RM205.00</p><p><strong>Adjusted Data</strong><br>1g (Buying): RM136.80 (-28%)<br>1g (Sell): RM172.20 (-16%)</p><p><strong>API Response</strong><br><pre>{
    "data": {
        "effective_date": "2019-04-19",
        "one_oz": {
            "buying": 5391,
            "selling": 5609
        },
        "half_oz": {
            "buying": 2696,
            "selling": 2858
        },
        "quarter_oz": {
            "buying": 1348,
            "selling": 1455
        }
    },
    "meta": {
        "last_updated": "2019-04-19 10:00:02",
        "total_result": 1
    }
}</pre></p><p><small><a href="https://api.bnm.gov.my/portal#operation/KELatest">Source BNM API Kijang Emas</a></small></p>
```
