<?php


namespace Application\Controller\Factory;
use Application\Controller\IndexController;
use Application\Controller\PruebaController;
use Application\Repository\MarcaRepository;
use Application\Repository\ProductoRepository;
use Application\Repository\ClienteRepository;
use Application\Repository\ColorRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.

        $marcaRepository = $container->get(MarcaRepository::class);
        
        $productoRepository = $container->get(ProductoRepository::class);
        
        $clienteRepository = $container->get(ClienteRepository::class);
        
        $colorRepository = $container->get(ColorRepository::class);
        
        $indexController = new IndexController($marcaRepository,$productoRepository, $clienteRepository, $colorRepository);
        return $indexController;
    }
}