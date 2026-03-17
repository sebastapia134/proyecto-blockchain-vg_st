  if (typeof window.ethereum !== 'undefined') {
    console.log('MetaMask está instalado!');
    
    // Conectar a MetaMask
    const web3 = new Web3(window.ethereum);

    // Solicitar acceso a la cuenta de MetaMask
    ethereum.request({ method: 'eth_requestAccounts' })
      .then(accounts => {
        const userAddress = accounts[0];
        console.log('Dirección de MetaMask:', userAddress);

        // Obtener saldo en SepholiaETH (en wei, la unidad más pequeña de ETH)
        web3.eth.getBalance(userAddress)
          .then(balance => {
            // Convertir el saldo de wei a ether (ETH)
            const balanceInEther = web3.utils.fromWei(balance, 'ether');
            console.log('Saldo en SepholiaETH:', balanceInEther);

            // Aquí puedes actualizar el monto en tu página
            document.getElementById('saldo').innerText = balanceInEther +" ETH";
            document.getElementById('cuenta').innerText =  userAddress;

          });
      })
      .catch(err => {
        console.error('Acceso denegado:', err);
      });
  } else {
    alert('Por favor, instala MetaMask para continuar.');
  }
