ft_services=("nginx" "wordpress")

minikube start --vm-driver=virtualbox
eval $(minikube docker-env)

minikube addons enable metallb
kubectl apply -f srcs/kubeconf/metallb.yaml

for service in "${ft_services[@]}"
do
docker build srcs/${service} -t "${service}-image"
done

for service in "${ft_services[@]}"
do
kubectl apply -f srcs/kubeconf/${service}.yaml
done