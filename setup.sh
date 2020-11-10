ft_services=("nginx" "wordpress" "phpmyadmin" "mysql" "ftps" "influxdb" "grafana")

minikube start --vm-driver=virtualbox
eval $(minikube docker-env)

minikube addons enable metallb
kubectl apply -f srcs/kubeconf/metallb.yaml
kubectl apply -f srcs/kubeconf/volume.yaml

for service in "${ft_services[@]}"
do
docker build srcs/${service} -t "${service}-image"
done

for service in "${ft_services[@]}"
do
kubectl apply -f srcs/kubeconf/${service}.yaml
done