from locust import HttpUser, task, between

class WebsiteUser(HttpUser):
    wait_time = between(1, 3)

    @task
    def load_php1(self):
        self.client.get("/?instance=1")

    @task
    def load_php2(self):
        self.client.get("/?instance=2")

    @task
    def connexion(self):
        payload = {"email": "a@a.com", "mdp": "aa"}
        self.client.post("/basics/connexion.php", data=payload)
