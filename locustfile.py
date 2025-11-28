from locust import HttpUser, task, between
import random

class MicroserviceUser(HttpUser):
    wait_time = between(1, 2)

    # 50% dynamic requests
    @task(50)
    def dynamic_user_service(self):
        user_id = random.randint(1000, 9999)
        self.client.post(
            "http://localhost:8001/users",
            json={"name": f"User{user_id}", "email": f"user{user_id}@example.com"}
        )

    # 50% synthetic requests
    @task(50)
    def synthetic_product_service(self):
        product_id = random.choice([1, 2])
        self.client.get(f"http://localhost:8002/products/{product_id}")
