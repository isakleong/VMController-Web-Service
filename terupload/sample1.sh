#!/bin/bash

out=/tmp/std.out

/bin/date '+%a, %e %b %Y %H:%M:%S %Z' >> $out

/usr/bin/curl https://www.bca.co.id 2>/dev/null | /bin/sed -n '/tbody/,/\/tbody/{/USD/{n;h;n;H;g;s/^[^0-9]*\([0-9,\.]*\)[^0-9]*\([0-9,\.]*\).*/BCA\tBeli:\2 Jual:\1/g;p}}' >> $out

echo '==========' >> $out
