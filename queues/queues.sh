#!/bin/sh
if ps aux | grep addstore | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=addstore --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sendemail | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=sendemail --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sync new item to zoho | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=additems --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sync adjusted item to zoho | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=adjustitem --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sync new customer to zoho | grep -v grep ; then
    continue 
else
    cd "$1" && php artisan queue:work 'jobs' --queue=addcustomers --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sync new sales order to zoho | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=addsalesorder --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi

#!/bin/sh
if ps aux | grep sync new sales invoice to zoho | grep -v grep ; then
    continue
else
    cd "$1" && php artisan queue:work 'jobs' --queue=addsalesinvoice --daemon --delay=30 & >> "$1/queues/queues.log" 2>&1
fi