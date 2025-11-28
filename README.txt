PHP Microservices Project

Services:
1. User Service (dynamic) - user_service.php
   Run: php -S localhost:8001 user_service.php

2. Product Service (synthetic) - product_service.php
   Run: php -S localhost:8002 product_service.php

3. Client Gateway - client_gateway.php
   Run: php -S localhost:8003 client_gateway.php

Testing:
- Add user: POST http://localhost:8001/users with JSON {"name":"Charlie","email":"charlie@example.com"}
- Get user: GET http://localhost:8001/users/1
- List products: GET http://localhost:8002/products
- Get product: GET http://localhost:8002/products/1
- Aggregate: GET http://localhost:8003?user=1&product=2

Load Testing with Locust:
1. Install: pip install locust
2. Run: locust -f locustfile.py
3. Open browser at http://localhost:8089
4. Set number of users = 100, spawn rate = 10
5. Locust will split traffic 50/50 between User Service and Product Service

Deliverables:
- PHP source code for User, Product, and Client Gateway
- locustfile.py for load testing
- README.txt with setup instructions
